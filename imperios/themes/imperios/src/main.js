import RootComponent from './root';
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import BAlert from 'bootstrap-vue/es/components/alert/alert';
import 'vue-awesome/icons/flag';
import 'vue-awesome/icons';
import Icon from 'vue-awesome/components/Icon';

Vue.component('v-icon', Icon);
Vue.component('b-alert', BAlert);
Vue.use(BootstrapVue);
Vue.use(VueAxios, axios); 



Vue.prototype.$axios = axios;


// attach a csrf token to all of our xhr requests
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name=token]').getAttribute('content');

// boot up our components, directives, plugins, etc...
import './app/boot';

// set up the router
import routes from './app/routes';

const router = new VueRouter({
    base: __dirname,
    mode: 'history',
    routes,
});

// instantiate our application and mount it to the dom
/* eslint-disable no-new */
new Vue({
    render: h => h(RootComponent),
    el: '#app',
    router,
});

document.body.addEventListener('touchmove', function(event) {
    event.preventDefault();
});