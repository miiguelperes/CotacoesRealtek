<template>
  <div id="admin">
    <b-container fluid>
      <b-row>
        <b-col cols="3" style="padding: 0px;height: 100vh;">
          <div class="lateral">
            <b-navbar variant="light" type="light" class="justify-content-between">
              <img
                src="http://realtec.com.br/wp-content/uploads/2018/03/logorealtec.png"
                style="    height: 40px;"
              >
              <b-link :to="'login'" class="btn-sair">Sair</b-link>
            </b-navbar>
            
            <b-list-group style="margin-top: 2vh;margin:10px;">
              <h6 style="color: #fff;">Área Administrador </h6>
              <b-list-group-item
                @click="cliente = false;open =false;"
                class="d-flex justify-content-between align-items-center click"
              >
                Verificar Cotações Abertas
                <b-badge variant="primary" pill>{{response.total}}</b-badge>
              </b-list-group-item>
              <b-list-group-item
                @click="cliente=true"
                class="d-flex justify-content-between align-items-center click"
              >Fornecedores</b-list-group-item>
            </b-list-group>
          </div>
        </b-col>
        <b-col cols="9" style="padding: 0px;">
          <div style="padding:30px;">
            <transition name="fade">
              <fornecedores-component v-if="cliente"/>
            </transition>
            <transition name="fade">
              <list-component v-if="!cliente"/>
            </transition>
          </div>
        </b-col>
      </b-row>
    </b-container>
    <div class="backs" v-if="spineer">
      <b-spinner class="m-5" label="Busy"></b-spinner>
    </div>
  </div>
</template>
<script>
import { SidebarMenu } from 'vue-sidebar-menu';
export default {
    name: 'Admin',
    components: {
        SidebarMenu,
        FornecedoresComponent: () => import('./fornecedores.vue'),
        ListComponent: () => import('./list.vue'),
    },
    data() {
        return {
            cliente: false,
            spineer: true,
            admin: '',
            response: '',
            theme: {
                type: String,
                default: 'white-theme',
            },
            menu: [
                {
                    header: true,
                    title: 'Main Navigation',
                },
                {
                    href: '/',
                    title: 'Dashboard',
                    icon: 'fa fa-user',
                },
            ],
        };
    },
    methods: {
        onItemClick(event, item) {
            console.log(event, item);
        },
    },
    created() {
        var self = this;
        var us = JSON.parse(localStorage.getItem('user'));
        //console.log(us);
        this.admin = us;
        if (!us) {
            this.$router.push('login');
        } else {
            if (us.grupo == 'Admin') {
                self.spineer = false;
            } else {
                this.$router.push('login');
            }
        }
    },
};
</script>
<style scoped>
.lateral {
  background: #17a2b8;
  width: 100%;
  height: 100%;
}
.btn-sair {
  padding: 8px 10px;
  margin: 10px;
  font-size: 10px;
  color: #fff;
  border-radius: 4px;
  background: #17a2b8;
}
.click {
  cursor: pointer;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active em versões anteriores a 2.1.8 */ {
  opacity: 0;
}
</style>
