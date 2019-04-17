<style>
body{
  background: #252122!important;
}

</style>
<style lang="scss" scoped>
@import "core";
.videos-page {
  text-align: center;
}
.top-mount{
      color: #fff!important;
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
    background: transparent;
    color: #fff;
    border: none;
    border-radius: 0px;
}
.card {
  width: 100% !important;
  max-height: 110.6px;
}
.card-body {
  padding: 0.3rem !important;
}
.card-img-left {
  max-height: 110px;
  max-width: 110px;
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
.add{
  background: transparent!important;
    border-radius: 0px!important;
    border: 1px solid #fff!important;
}
.added{
      border-radius: 0px!important;
}
.navbar-toggler {
    color: #f7b320!important;
    border-color: #f7b320!important;
}
.navbar-toggler-icon{
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='#f7b320' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E")!important;
}
.categoria{
    border-top: 1px solid #fff;
    display: flex;
    margin-top: 22px;
    padding-bottom: 12px;
    justify-content: flex-start;
}
.logomain{
  width: 45px;
}
.topo{
      padding: 0px!important;
    margin: 0px!important;
    color: #f7b320!important;
}
.icons-my{
  color: #f7b320;margin-right: 10px;
}
.navbar-nav {

    align-items: flex-start;
    }
    .nav-item{
      margin-top: 10px;
      color: #fff;
    }
.navbar-nav .nav-link {
    color: rgba(255, 255, 255, 0.8);
}
.cartin{
  margin-top: -4px;
  position: relative;
}
.cartin .bole{
      right: -5px;
    font-size: 13px;
    background: red;
    color: #fff;
    width: 20px;
    position: absolute;
    top: -8px;
    border-radius: 100%;
    height: 20px;
}
.cartin img{
  height: 30px;  
}

</style>

<template>
  <div class="videos-page">
    <b-container  style="padding-top: 60px;padding-bottom: 60px">
      <b-row>
        <div class="todo-body" v-for="cat in categorias" :key="cat.id">
         <div class="categoria" align-items-start>
         <h4 class="top-mount">{{cat.nome}}</h4>
        </div> 
        
          <b-card
            v-for="item in produtos"
            :key="item.id"
            v-if="item.categoria_id == cat.id"
            :img-src="item.path"
            img-alt="Card image"
            img-left
            class="mb-3"
          >
            <b-card-text>
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">{{item.nome}}</h6>
                <small class="text-muted top-mount">{{item.volume}}</small>
              </div>
              <p class="text-midle">{{item.descricao}}</p>
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1 bold top-mount">R$ {{item.valor}}</h6>
                <small class="text-muted">
                  <b-button  class="add" v-if="!item.added" size="sm" @click="item.added = true;addToCart(item);">Adicionar</b-button>
                  <b-button class="added"  v-if="item.added" size="sm" @click="item.added = false;removeFromCart(item);"  variant="success">Adicionado</b-button>
                </small>
              </div>
            </b-card-text>
          </b-card>
        </div>
      </b-row>
    </b-container>

    <b-navbar toggleable="lg" fixed="top" type="dark" variant="dark">
      
      <img class="logomain" src="../../assets/logo.svg">
     <h6 class="top-mount topo">CARDÁPIO</h6>
      
      <v-icon name="bars" v-b-toggle.nav_collapse class="icons-my"/>
      <b-collapse is-nav id="nav_collapse">
        <b-navbar-nav>
          <b-nav-item @click="goToPage('cart')"><v-icon name="shopping-cart" class="icons-my"/> Carrinho</b-nav-item>
          <b-nav-item ><v-icon name="user" class="icons-my"/> Perfil</b-nav-item>
          <b-nav-item @click="logout()"><v-icon name="sign-out-alt" class="icons-my"/> Sair</b-nav-item>
          <b-nav-item ><v-icon name="question-circle" class="icons-my"/> Ajuda </b-nav-item>
          <b-nav-item ><v-icon name="exclamation-circle" class="icons-my"/> Sobre</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>

    <b-navbar toggleable="lg" fixed="bottom" type="dark" variant="dark" style="padding-bottom: 0px;">
       
       <div class="cartin">
         <div class="bole">{{cart.length}}</div>
         <img class="logomain" src="../../assets/cart.svg">
       </div>
        <h5 class="top-mount"><b-button  @click="$router.push('cart');"  :disabled="!cart.length > 0" variant="success">Finalizar</b-button></h5>
    </b-navbar>
    <b-modal v-model="show" id="modal1" scrollable :hide-footer="true" :hide-header="true" style="height:90vh;">
      <CartComponent v-if="show" style="height: 100%;"/>
    </b-modal>
  </div>
</template>


<script>
import CartComponent from 'pages/cart/cart';

export default {
    components: {
        CartComponent,
    },
    data() {
        return {
            ROOT_API: 'http://localhost/',
            show: false,
            produtos: [],
            categorias: [],
            cart: [],
        };
    },
    methods: {
        goToPage(page){
            this.$router.push(page);
        },
        addToCart(obj){
            //this.cart = JSON.parse(localStorage.cart);
            this.cart.push(obj);
            localStorage.cart = JSON.stringify(this.cart);
            this.produtos.forEach(p=>{
                if(p.id == obj.id){
                    p.added = true;
                }
            });
        },
        removeFromCart(obj){
            var self = this;
            self.cart = JSON.parse(localStorage.cart);
            self.cart.forEach((element, i) => {
                if(obj.id == element.id)  {
                    self.cart.splice(i, 1);
                }
            });
            self.produtos.forEach(p=>{
                if(p.id == obj.id){
                    p.added = false;
                }
            });
          
            localStorage.cart = JSON.stringify(this.cart);
        },
        logout(){
            localStorage.user = JSON.stringify('{}');
            this.$router.push('home');
        },
        load(data) {
            var self = this;
            var cart = false;
            
            var a = localStorage.getItem('cart');
            if(a){
                Promise.resolve(JSON.parse(localStorage.cart))
                    .then(r=>{
                        self.cart = r;
                        cart = r;
                        data.forEach(element => {
                            element.added = false;
                            cart.forEach(c => {
                                if(element.id == c.id){
                                    element.added = true;
                                }
                            });
                        });
                    });

            }else{
               
            }

            
            
            self.produtos = data;
            
        },
        receiveProducts() {
            var self = this;
            this.$http.get(this.ROOT_API + 'api/v1/produtos').then(resp => {
                this.load(resp.data);
            });
        },
        
        receiveCategorias() {
            var self = this;
            this.$http.get(this.ROOT_API + 'api/v1/categorias').then(resp => {
                self.categorias = resp.data;
            });
        },
    },
    created: function() {
        
        this.ROOT_API = 'https://'+window.location.hostname+'/';
        var self = this;
        
        var user = false;
        var a = localStorage.getItem('cart');
        if(a){
            self.cart = JSON.parse(localStorage.cart); 
        }

        try {
            user = JSON.parse(localStorage.user);
        } catch (error) {
            self.$router.push('home');
        }
       
       
        if (user.status) {
            self.receiveCategorias();
            self.receiveProducts();
        } else {
            localStorage.cart = [];
            self.$router.push('home');
        }
    },
    beforeDestroy() {
        //localStorage.prods = JSON.stringify(this.produtos);
    },
};
</script>

