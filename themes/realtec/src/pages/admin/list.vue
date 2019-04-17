<template>
  <div id="list-page">
    <h4>Olá {{admin.name}}! Aqui estão suas cotações:</h4>
    <br>

    <div class="list">
      <b-list-group>
        <b-list-group-item
          v-for="cotacao in response.data"
          :key="cotacao.id"
          @click="getCotacao(cotacao)"
          class="hoverlist flex-column click align-items-start"
        >
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{cotacao.descricao}}</h5>
            <small>Data final {{cotacao.data_final | formatDate}}.</small>
          </div>

          <p class="mb-1">Esta cotação contém {{cotacao.prods.length}} produtos.</p>

          <small>
            <b-badge>Novo</b-badge>
            Cadastrada em em {{cotacao.created_at | formatDate}}.
          </small>
        </b-list-group-item>
      </b-list-group>
      <transition name="fade">
        <div v-bind:class="{ boxall: open, boxallopen: !open }">
          <button @click="open = false" class="close-btn">
            <font-awesome-icon icon="times" /> 
          </button>
          <div class="box-todo" v-if="cotaSel">
            <h5>{{cotaSel.descricao}}</h5>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">EAN13</th>
                  <th scope="col">Descricao</th>
                  <th v-for="c in clientesOK" :key="c.id" scope="col">Preço {{c.name}}</th>
                </tr>
              </thead>
              <tbody>
                  <tr v-for="p in cotaSel.prods" :key="p.id">
                    <th>{{p[0].id}}</th>
                    <td>{{p[0].nome}}</td>
                    <td>{{p[0].codigo}}</td>
                    <td>{{p[0].descricao}}</td>
                    <td v-for="itens in atualCota" :key="itens.id" v-if="p[0].id == itens.idproduto">
                      R$ {{itens.preco}}
                    </td>
                  </tr>
              </tbody>
            </table>                       

            
          </div>
        </div>
      </transition>
    </div>
    <div class="backs" v-if="spineer">
      <b-spinner class="m-5" label="Busy"></b-spinner>
    </div>
  </div>
</template>
<script>
export default {
    name: 'ListComponent',
    data() {
        return {
            admin:[],
            cotaSel:[],
            clientesOK: [],
            spineer: true,
            atualCota: false,
            open: false,
            clients: [],
            response: '',
        };
    },
    methods: {
        calcFornecedor() {
            var clientes = [];
            var clientesOK = [];
            var self = this;
            Array.prototype.unique=function(a){
                return function(){return this.filter(a);};}(function(a,b,c){return c.indexOf(a,b+1)<0;
            });
            new Promise(resolve => {
                this.axios.get('http://realtec.peresbusinessintelligence.com.br/api/v1/getall').then(res => {
                    clientes = res.data;
                    self.atualCota.forEach(el => {
                        clientes.forEach(r => {
                            //console.log('r',r);
                            console.log(el.idfornecedor, r.id);
                            if (el.idfornecedor == r.id) {
                                clientesOK.push(r);                                
                            }
                        });
                    });
                    resolve(clientesOK);
                });
            }).then(r=>{
                
                self.clientesOK = r.unique();
            });

            
        },
        getCotacao(cota) {
            var self = this;
            self.open = true;
            self.cotaSel = cota;
            self.axios
                .post('http://realtec.peresbusinessintelligence.com.br/api/v1/preenchidas', { idcotacao: cota.id })
                .then(resp => {
                    self.open = true;
                    console.log(resp.data);
                    self.atualCota = resp.data;
                    self.calcFornecedor();
                });
        },
    },
    created() {
        var self = this;
        self.admin = JSON.parse(localStorage.getItem('user'));
        self.axios.get('http://realtec.peresbusinessintelligence.com.br/api/v1/cotacoes').then(r => {
            self.response = r.data;
            self.spineer = false;
            //console.log(self.response);
        });
    },
};
</script>
<style  scoped>
.list {
  overflow-y: scroll;
  height: 81vh;
}
.hoverlist:hover {
  background: #17a2b8;
  color: #fff;
  padding-left: 30px;
  transition: 0.3s padding ease-out, 0.15s margin ease-out,
    0.15s border ease-out;
}
.close-btn{
  background-color: transparent;
  color: #fff;
  padding:15px;
  border: none;
  cursor: pointer;
  transition: 0.4s background-color;
}
.close-btn:hover{
  background-color: #117d8e;
}
.box-todo {
  width: 100%;
  height: 100%;
  padding: 20px;
  overflow: scroll!important;
  overflow-x: scroll!important;
  background: #fff;
}
.table{
  overflow: scroll!important;
}
.boxallopen {
  display: flex;
  position: absolute;
  bottom: 0;
  right: 0;
  opacity: 0;
  width: 100px;
  height: 100%;
  background: #17a2b8;
  -webkit-transition: width 1s, height 0.5s, opacity 1s, padding-left 1s; /* For Safari 3.1 to 6.0 */
  transition: width 1s, height 0.5s, opacity 1s, padding-left 1s;
}
.boxall {
  display: flex;
  position: absolute;
  bottom: 0;
  right: 0;
  opacity: 1;
  width: 100%;
  height: 100%;
  background: #17a2b8;
  -webkit-transition: width 1s, height 0.5s, opacity 1s, padding-left 1s; /* For Safari 3.1 to 6.0 */
  transition: width 1s, height 0.5s, opacity 1s, padding-left 1s;
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active em versões anteriores a 2.1.8 */ {
  opacity: 0;
}
.click {
  cursor: pointer;
}
</style>
