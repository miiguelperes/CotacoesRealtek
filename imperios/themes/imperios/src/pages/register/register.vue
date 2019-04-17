<style>
body{
  background: #252122!important;
}

</style>
<style lang="scss" scoped>
@import "core";
.register-page {
  background: #252122;
  align-items: center;
  display: flex;
  font-weight: 300;
  height: 100%;
  justify-content: center;
  text-align: center;
  width: 100%;
}

img {
  margin: 20px;
}

a {
  display: block;
  font-size: 1.5rem;
  margin: 10px;
}
.maindiv {
  margin: auto;
  display: flex;
  width: 100%;
  align-items: center;
  justify-content: center;
}
.logomain {
  width: 190px;
  height: 200px !important;
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active em versões anteriores a 2.1.8 */ {
  opacity: 0;
}
.white-text {
  color: #fff;
}
input[type=text],input[type=email], input[type=password] {
  background-color: #252122 !important;
  color: white!important;
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-radius: 0%;
  border-bottom: 1px solid #fff!important;
}
input[type=text]:hover,input[type=email]:hover, input[type=password]:hover {
  background-color: #4b4244 !important;
  color: white!important;
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-radius: 0%;
  border-bottom: 1px solid #fff!important;
}
.entrar{
  padding: 9px;
      width: 100%;
    border-radius: 0px;
    border: 1px solid #fff;
    background: transparent;
    color: #fff;
}
.entrar:hover, .entrar:active{
  padding: 9px;
      width: 100%;
    border-radius: 0px;
    border: 1px solid #252122;
    background: #fff;
    color: #252122;
}
</style>

<template>
  <div class="register-page">
    <b-container fluid>
      <b-row align-items-center>
        <b-col>
          <img  class="logomain" src="../../assets/logo.svg">
        </b-col>
      </b-row>
      <transition name="fade">
        <div v-if="after">
          <b-row class="my-1">
            <b-col sm="9">
              <input placeholder="NOME" v-model="nome" id="type-text" type="text"/>
            </b-col>
          </b-row>
          <b-row class="my-1">
            <b-col sm="9">
              <input placeholder="EMAIL" v-model="email" id="type-email" type="email"/>
            </b-col>
          </b-row>
          <b-row class="my-1">
            <b-col sm="9">
              <input placeholder="SENHA" v-model="senha" id="type-password" type="password"/>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <br>
              <button class="entrar" @click="test()">Cadastrar</button>
            </b-col>
          </b-row>
      <b-row v-if="error">
        <b-col>
          <br>
          <b-alert show variant="danger">Email existente ou inválido.</b-alert>
        </b-col>
      </b-row>
          <b-row>
            <b-col md="9">
              <br>
              <h6 class="white-text" @click="login()">FAZER LOGIN</h6>
            </b-col>
          </b-row>
        </div>
      </transition>

      <b-row>
        <b-col md="9">
          <br>
          <b-alert
            :show="dismissCountDown"
            dismissible
            fade
            variant="warning"
            @dismissed="dismissCountDown=0"
            @dismiss-count-down="countDownChanged"
          >{{mensagem }} Redirecionando em {{ dismissCountDown }} segundos...</b-alert>
        </b-col>
      </b-row>

      
    </b-container>
  </div>
</template>

<script>
export default {
    data() {
        return {
            ROOT_API: 'http://localhost/',
            show: false,
            nome: '',
            email: '',
            senha: '',
            error: false,
            after: true,
            dismissSecs: 5,
            mensagem: null,
            dismissCountDown: 0,
            showDismissibleAlert: true,
        };
    },
    methods: {
        test() {
            var self = this;
            self.error = false;
            var body = {
                email: self.email,
                pass: self.senha,
                nome: self.nome,
            };

            self.$http
                .post(self.ROOT_API + 'api/v1/register', body)
                .then(resp => {
                    if (resp.data.status == 1) {
                        self.mensagem = resp.data.message;
                        self.dismissCountDown = 4;
                        self.after = false;
                        setTimeout(function() {
                            self.$router.push('home');
                        }, 4000);
                        //self.$router.push('Home');
                    }else{
                        self.mensagem = resp;
                        self.error = true;
                    }
                }).catch(c => {
                    self.mensagem = c;
                    self.error = true;
                });
        },
        login() {
            var self = this;
            self.$router.push('home');
        },
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown;
        },
    },
    created: function() {
        this.ROOT_API = 'https://'+window.location.hostname+'/';
        //console.log(this.ROOT_API);
    },
    beforeCreate() {
        var self = this;
    },
};
</script>
