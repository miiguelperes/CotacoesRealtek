
<template>
  <b-container fluid>
    <b-row fluid>
      <b-col class="no-padding">
        <div class="todo-left">
          <b-navbar variant="light" type="light" class="justify-content-between">
            <img
              src="http://realtec.com.br/wp-content/uploads/2018/03/logorealtec.png"
              style="    height: 40px;"
            ><b-link :to="'login'" class="btn-sair">Sair</b-link>
          </b-navbar>
          <b-list-group style="margin-top: 2vh;">
            <b-list-group-item
              @click="listClose()"
              class="d-flex justify-content-between align-items-center click"
            >
              Cotações Disponíveis
              <b-badge variant="primary" pill>{{response.total}}</b-badge>
            </b-list-group-item>
          </b-list-group>
          
        </div>
      </b-col>
      <b-col cols="9" class="no-padding">
        <b-container fluid>
          <transition name="slide-fade">
            <b-row v-if="list" style="padding: 40px">
              <b-col cols="12">
                <h4>Olá {{fornecedor.name}}, {{response.message}}!</h4>
              </b-col>
              <b-col cols="12" style="margin-top: 40px;">
                <b-list-group>
                  <b-list-group-item
                    @click="openCotacao(cotacao)"
                    v-for="cotacao in response.data"
                    :key="cotacao.id"
                    class="hoverlist flex-column click align-items-start"
                  >
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">{{cotacao.descricao}}</h5>
                      <small>Data final {{cotacao.data_final | formatDate}}. </small>
                      
                    </div>

                    <p class="mb-1">Esta cotação contém {{cotacao.prods.length}} produtos.</p>

                    <small><b-badge>Novo</b-badge> Cadastrada em em {{cotacao.created_at | formatDate}}.</small>
                    
                  </b-list-group-item>
                </b-list-group>
                  
              </b-col>
            </b-row>
          </transition>
          <transition name="slide-fade">
            <b-row v-if="list2">
              <main-component v-bind="atualCotacao"/>
            </b-row>
          </transition>
        </b-container>
      </b-col>
    </b-row>
    <div class="backs" v-if="spineer">
      <b-spinner class="m-5" label="Busy"></b-spinner>
    </div>
  </b-container>
</template>
<script>
import MainComponent from './main.vue';

export default {
    name: 'Home',
    components: {
        MainComponent,
    },
    data() {
        return {
            spineer: true,
            response: [],
            list: true,
            fornecedor: '',
            list2: false,
            atualCotacao: false,
        };
    },
    methods: {
        openCotacao(cotacao) {
            var self = this;
            self.atualCotacao = cotacao;
            self.list = false;

            setTimeout(function() {
                self.list2 = true;
            }, 300);

            console.log(cotacao);
        },
        listClose() {
            var self = this;
            self.list2 = false;

            setTimeout(function() {
                self.list = true;
            }, 300);
        },
    },
    created() {
        if(localStorage.getItem('user') === null){
            this.$router.push('login');
        }
        var us = JSON.parse(localStorage.getItem('user'));
        this.fornecedor = us;
        
        if(us.grupo == 'Admin'){
            this.$router.push('admin');
        }
        if(!us){
            this.$router.push('login');
        }else{
            this.axios.get('http://realtec.peresbusinessintelligence.com.br/api/v1/cotacoes').then(r => {
                this.response = r.data;
                this.spineer = false;
                console.log(r.data);
            });
        }
        
    },
};
</script>
<style lang="scss" scoped>
@import "core";
.home-page {
  align-items: center;
  display: flex;
  font-weight: 300;
  height: 100%;
  justify-content: center;
  text-align: center;
  width: 100%;
}
.click {
  cursor: pointer;
}
.hoverlist:hover{
  background: #17a2b8;
  color: #fff;
   padding-left: 30px;
  transition: 0.30s padding ease-out, 0.15s margin ease-out, 0.15s border ease-out;
}

.btn-sair{
      padding: 9px 26px;
    margin: 10px;
    color: #fff;
    border-radius: 4px;
    background: #17a2b8;
}
.todo-left {
  height: 100vh;
  padding: 10px;
  background: #17a2b8;
}
.no-padding {
  padding: 0px !important;
}
.slide-fade-enter-active {
  transition: all 0.3s ease;
}
.slide-fade-leave-active {
  transition: all 0.2s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active em versões anteriores a 2.1.8 */ {
  transform: translateX(50px);
  opacity: 0;
}
</style>