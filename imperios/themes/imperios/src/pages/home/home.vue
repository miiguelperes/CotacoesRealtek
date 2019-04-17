<style>
body{
  background: #252122!important;
}

</style>

<style lang="scss" scoped>
@import "core";


.home-page {
  background-color: #252122;
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
  border: 1px solid #252122;
  height: 200px !important;
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active em versões anteriores a 2.1.8 */ {
  opacity: 0;
}
.white-text{
    color: #fff;
}
input[type=email], input[type=password] {
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
input[type=email]:hover, input[type=password]:hover {
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
  <div class="home-page">
    <b-container fluid>
      <b-row>
        <b-col>
          <transition name="fade">
            <img v-if="show" class="logomain" src="../../assets/logo.svg">
          </transition>
        </b-col>
      </b-row>
      <b-row class="my-1">
            
            <b-col>
              <input v-model="email" placeholder="E-MAIL" id="type-email" type="email"/>
            </b-col>
          </b-row>
          <b-row class="my-1">
           
            <b-col >
              <input v-model="senha" placeholder="SENHA"  id="type-password" type="password"/>
            </b-col>
          </b-row>
      <b-row>
        <b-col>
          <br>
          <button class="entrar" @click="login()">ENTRAR</button>
        </b-col>
      </b-row>
      <b-row>
        <b-col>
          <br>
          <h6 class="white-text" @click="registro()">CRIAR UMA CONTA</h6>
        </b-col>
      </b-row>
       <b-row v-if="error">
        <b-col>
          <b-alert show variant="danger">{{mensagem_e}}</b-alert>
        </b-col>
      </b-row>
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
            ROOT_API: '',
            show: true,
            email:'',
            senha:'',
            error: false,
            mensagem_e: '',
            dismissSecs: 1,
            mensagem: null,
            dismissCountDown: 0,
            showDismissibleAlert: true,
        };
    },
    methods: {
        registro(){
            var self = this;
            self.$router.push('register');
        },

        
      
        login() {
            var self = this;
            var body = {
                email: self.email,
                pass: self.senha,
            };
            self.$http
                .post(self.ROOT_API+'api/v1/login',body)
                .then(resp => {
                    if(resp.data.status == 1){
                        self.error = false;
                        self.dismissCountDown = 1;
                        localStorage.user = JSON.stringify(resp.data);
                        //console.log(localStorage.user);
                        setTimeout(function() {
                            self.$router.push('/');
                        }, 1000);
                    }else{
                        
                        self.mensagem_e = resp.data;
                        self.error = true;
                        console.log(resp.data);
                    }
                    
                });
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
        
        localStorage.user = JSON.stringify('{}');
        var self = this;
        setTimeout(function() {
            self.show = true;
        }, 1000);
    },
};
</script>
