<template>
  <div class="main-page">
     <b-navbar toggleable="lg" type="dark" variant="info">
    <b-navbar-brand >{{cotacao.descricao}}</b-navbar-brand>
     </b-navbar>
     
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">EAN13</th>
          <th scope="col">Descricao</th>
          <th scope="col">Preço</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.id">
          <th scope="row">{{item.id}}</th>
          <td>{{item.nome}}</td>
          <td>{{item.codigo}}</td>
          <td>{{item.descricao.substring(0,20)+".."}}</td>
          <td>
            <b-form-input v-model="item.preco" type="number" placeholder="Inserir Preço"></b-form-input>
          </td>
        </tr>
      </tbody>
    </table>
     <b-navbar toggleable="lg"  type="dark" variant="info" class="nav-btt">
          <b-navbar-brand>Disponível até {{cotacao.data_final | formatDate}}</b-navbar-brand>
        <b-button @click="finalizar">Enviar Cotação</b-button>
     </b-navbar>
     <b-modal ref="my-modal" @ok="okModal" @cancel="$router.go()" cancel-title="Cancelar" hide-header centered title="Using Component Methods">
      <div class="d-block text-center">
        <h3>{{msg}}</h3>
      </div>
    </b-modal>
  </div>
</template>
<script>
export default {
    name: 'MainComponent',
    data() {
        return {
            msg: 'Deseja realmente enviar a cotação?',
            fornecedor: '',
            cotacao: this.$attrs,
            items: [],
            ppp: '',
        };
    },
    methods: {
        finalizar(){
            var self = this;
            var body = {
                idcotacao: this.cotacao.id,
                idfornecedor: this.fornecedor.id,
            };
            this.axios.post('http://realtec.peresbusinessintelligence.com.br/api/v1/exist', body).then(r=>{
                
                if(r.data.status == 2){                    
                    self.msg = r.data.message;
                }else{
                    self.msg = 'Deseja realmente enviar a cotação?';
                }
                this.$refs['my-modal'].show();
            });
            
        },
        okModal(){
            var body = [];
            this.items.forEach(e=>{
                var prod = {
                    idproduto: e.id,
                    preco: e.preco, 
                    idcotacao: this.cotacao.id,
                    idfornecedor: this.fornecedor.id,
                };
                body.push(prod);
            });
            
            this.axios.post('http://realtec.peresbusinessintelligence.com.br/api/v1/inserircotacao', body).then(r=>{
                alert(r.data.message);
            });
                    
            
        },
    },
    created() {
        
        var us = localStorage.getItem('user');

        this.fornecedor = JSON.parse(us);

        var self = this;

        this.cotacao.prods.forEach(element => {
            let item = {
                id: element[0].id,
                nome: element[0].nome,
                codigo: element[0].codigo,
                descricao: element[0].descricao,
                preco: element[0].preco,
            };
            //console.log(item);
            self.items.push(item);
        });
    },
};
</script>
<style scoped>
.main-page {
  height: 100%;
  width: 100%;
}
.nav-btt{
  display: flex;
    position: absolute;
    width: 100%;
    bottom: 0px;
    justify-content: flex-end;
}
</style>
