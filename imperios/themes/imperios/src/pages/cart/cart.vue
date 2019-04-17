<style lang="scss" scoped>
@import "core";
.cart-page {
  text-align: center;
}
.top-mount {
  color: #fff;
}
h1 {
  border-bottom: 1px solid #ccc;
  margin: 0 auto;
  max-width: 500px;
  padding-bottom: 12px;
}

a {
  display: block;
  padding: 12px 0;
}

.list-body {
  font-size: 14px !important;
}
.list-group-item {
  padding: 7px;
}
.todo-body {
  width: 100% !important;
}
.todo-body .card {
  width: 100% !important;
}
.card {
  width: 100% !important;
  max-height: 110.6px;
  box-shadow: 0px 0 4px 0px #19191963;
}
.card-body {
  padding: 0.3rem !important;
}
.card-img-left {
  max-height: 77px;
  max-width: 77px;
}
.text-midle {
  text-align: right;
  font-size: 13px;
  line-height: 1;
  margin-top: 2px;
  min-height: 45px;
  margin-bottom: 0;
}
.bold {
  font-weight: 600;
  color: #6c757d;
}
.navbar-toggler {
  color: rgb(255, 255, 255) !important;
  border-color: rgb(255, 255, 255) !important;
}
.input-n {
  width: 41px;
  height: 31px;
  font-size: 13px;
  margin-left: 5px;
}
.box-input {
  display: flex;
  align-items: baseline;
  font-size: 14px;
}
.padding-q {
  margin-top: 5px;
}
.basenav{
  justify-content: space-between;display: flex;background:#fff;width: 100%;align-items: baseline;
}
.modal-footer{
      padding: 0;
     padding-top: 16px; 
}
.altera{
  color: red;
  font-weight: 600;
  padding: 1px 6px;
    border: 1px solid;
    border-radius: 4px;
}
.modal-title {
    margin-bottom: 0;
    font-size: 17px;
    font-weight: 600;
    line-height: 1.5;
}
.modalorder{
  max-width: 60px;
}
.modalorder.modal-content
{
  margin: auto;
  width: 72%;
}
.bodyorder{
  display: flex;
  justify-content: center;
  flex-direction: column;
  width: 100%;
  align-items: center;
}
</style>

<template>
<transition name="slide">
  <div class="videos-page">
    <b-container style="padding-top: 60px;padding-bottom: 60px">
      <b-row>
        <b-card
          v-for="item in produtos"
          :key="item.id"
          :img-src="item.path"
          img-alt="Card image"
          img-left
          class="mb-3"
        >
          <b-card-text>
            <div class="d-flex w-100 justify-content-between">
              <h6 class="mb-1">{{item.nome}}</h6>
              <b-button @click="removeFromCart(item)" size="sm">
                <v-icon name="trash-alt"/>
              </b-button>
            </div>

            <div class="d-flex w-100 justify-content-between padding-q">
              <h6 class="mb-1 bold">R$ {{item.valor}}</h6>
              <span class="box-input">Quantidade
                <b-form-input id="type-number" v-model="item.qtd" @change="soma" type="number" class="input-n"/>
              </span>
            </div>
          </b-card-text>
        </b-card>
      </b-row>
    </b-container>
    <!--
    <b-navbar toggleable="lg" fixed="top" type="dark" variant="dark">
      <h5 class="top-mount">Carrinho</h5>
    </b-navbar>-->
    
    <b-navbar toggleable="lg" fixed="top" style="justify-content: space-between;display: flex;background:#fff;">
      
      <b-button @click="leave()" variant="success">Voltar</b-button>
      <h4>Carrinho</h4>
    </b-navbar>

    <b-navbar toggleable="lg" fixed="bottom" style="background:#fff;">
        <div class="basenav" style="padding-bottom: 6px">
         <span>Endereço: <b>{{endereco.substring(0,20)+".." }}</b></span> <span class="altera">alterar</span>
        </div>
        <div class="basenav">
          <h5>Total R$ {{total}}</h5>
          <b-button @click="showmodal()" variant="success">Confirmar Pedido</b-button>
        </div>
    </b-navbar>

    <b-modal ref="modal1" scrollable hide-footer centered title="Confirmar Pedido">
      <div>
        
        <h6>Seu pedido será entregue no seguinte endereço: <b>{{endereco}}</b></h6>
      </div>
      <div style="padding-bottom: 10px">
        <b-form-textarea
            id="textarea-auto-height"
            v-model="obs"
            :state="obs.length >= 1"
            placeholder="Deixe alguma observação sobre seu pedido."
            rows="3"
            max-rows="4"
          />
      </div>
      <div style="display: flex; justify-content: space-between; width: 100%;padding-bottom:10px;">
        <table style="width: 165px;">
          <tr>
            <th style="font-weight: 400;">Pedido:</th>
            <th style="font-weight: 400;">R$ {{total}}</th> 
          </tr>
          <tr>
            <td>Entrega:</td>
            <td>R$ 00,00</td> 
          </tr>
        </table>
        <table style="margin-top: 24px;">
          <tr>
            <td><b>Total:</b></td>
            <td><b>R$ {{total}}</b></td> 
          </tr>
        </table>
      </div>
          
     <footer class="modal-footer">
        <div class="basenav">
          <b-button @click="modal = false" variant="danger">Cancelar</b-button>
          <b-button @click="confirm()" variant="success">Confirmar</b-button>
        </div>
     </footer>
    
    </b-modal>

    <b-modal @hide="conclused()" class="modalorder" v-model="modalOrder" centered hide-footer hide-header>
      <div class="bodyorder">
        <v-icon name="truck" style="font-size:70;" ></v-icon>
        <h5>{{modalOrderData.message}}</h5>
        <h6>Prazo de entrega de 40 a 60 minutos.</h6>
        <h6>Número do pedido: <b v-if="modalOrderData">{{modalOrderData.venda.id}}</b></h6>
      </div>
    </b-modal>
  </div>
 </transition>
</template>

<script>


export default {
    data() {
        return {
            ROOT_API: 'http://localhost/',
            show: true,
            modal: false,
            modalOrder: false,
            modalOrderData:'',
            produtos: [],
            total: 0.0,
            endereco: '',
            obs:'',
        };
    },
    methods: {
        conclused(){            
            localStorage.cart = [];
            this.$router.push({name:'videos'});
        },
        showmodal(){
            this.$refs.modal1.show();
        },
        leave(){
            this.$router.go(-1);
            
        },
        soma(){
            var tt = 0.0;
        
            this.produtos.forEach(element=>{
                tt += parseFloat(element.valor).toFixed(2)*parseInt(element.qtd);
            });

            this.total = parseFloat(tt).toFixed(2);
        },
        confirm() {
            this.$refs.modal1.hide();
            var self = this;
            self.soma();
            var user = JSON.parse(localStorage.user).user.id;
            var prods = [];
            this.produtos.forEach(element => {
                prods.push({'produto': element.id,'qnt':element.qtd});
            });
            var body = {
                user: user,
                total: self.total,
                produtos: prods,
                endereco: self.endereco,
                obs: self.obs,
            };
            self.postVenda(body);
        },
        postVenda(body){
            var self = this;
            self.$http
                .post(self.ROOT_API+'api/v1/venda', body)
                .then(resp => {
                    self.modal = false;
                    self.modalOrderData = resp.data;
                    self.modalOrder = true;
                    
                    
                }).catch(e => {
                    console.log(e);
                });
        },
        removeFromCart(obj) {
            var self = this;

            self.produtos.forEach((element, i) => {
                if (obj.id == element.id) {
                    self.produtos.splice(i, 1);
                }
            });

            //this.produtos.pop(obj);
            localStorage.cart = JSON.stringify(this.produtos);
            
            this.soma();
        },
    },
    created: function() {
        this.ROOT_API = 'https://'+window.location.hostname+'/';
        this.produtos = JSON.parse(localStorage.cart);
        
        this.produtos.forEach(element => {
            element.qtd = 1;
        });
        this.soma();
        this.endereco = JSON.parse(localStorage.user).user.endereco;
    //console.log(this.produtos);
    },
};
</script>
