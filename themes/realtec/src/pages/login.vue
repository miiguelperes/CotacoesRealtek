<template>
  <div id="login">
    <b-row class="d-flex justify-content-center">
      <b-col sm="8" class="d-flex justify-content-center p">
        <img
          src="http://realtec.com.br/wp-content/uploads/2018/03/logorealtec.png"
          style="height: 100px;"
        >
      </b-col>
      <b-col sm="8" class="p">
        <b-form-input v-model="email" placeholder="E-mail" type="email"></b-form-input>
      </b-col>
      <br>
      <b-col sm="8" class="p">
        <b-form-input v-model="senha" placeholder="Senha" type="password"></b-form-input>
      </b-col>
<!--
      <b-col sm="8" class="d-flex justify-content-center p">
        <b-form-radio-group
          id="btn-radios-1"
          v-model="selected"
          :options="options"
          buttons
          name="radios-btn-default"
        ></b-form-radio-group>
      </b-col>-->
      <b-col cols=8 v-if="erro">
        <b-alert show variant="danger">{{erro}}</b-alert>
      </b-col>
      <b-col sm="8" class="p">
        <button type="button" @click="login" class="btn btn-secondary btn-block">Entrar</button>
      </b-col>
    </b-row>
    <div class="backs" v-if="spineer">
      <b-spinner class="m-5" label="Busy"></b-spinner>
    </div>
  </div>
</template>
<script>
export default {
    data() {
        return {
            spineer: false,
            email: '',
            senha:'',
            erro: false,
            selected: 1,
            options: [
                { text: 'Fornecedor', value: 1 },
                { text: 'Administrador', value: 2 },
            ],
        };
    },
    methods: {
        login(){
            
            var self = this;
            self.erro = false;
            self.spineer = true;
            var body = {
                email: self.email,
                pass: self.senha,
                type: self.selected,
            };
            this.axios.post('http://realtec.peresbusinessintelligence.com.br/api/v1/login', body).then(r => {
                //this.response = r.data;
                //                console.log(r.data);
                var status = r.data;
                if(status.status == 1){
                    localStorage.setItem('user', JSON.stringify(status.user));
                    if(status.user.grupo == 'Fornecedor'){
                        self.$router.push('/');
                    }
                    if(status.user.grupo == 'Admin'){
                        self.$router.push('admin');
                    }
                    
                }else{
                    self.erro = status.message;
                    self.spineer = false;
                }
            });
        },
    },
    created() {
        localStorage.removeItem('user');
    },
};
</script>
<style scoped>
.p {
  padding: 20px;
}
#login {
  margin-top: 10%;
  display: flex;
  width: 100vw;
  flex-flow: column;
  justify-content: center;
  align-items: center;
}
</style>