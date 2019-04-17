import RootComponent from './root';
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';

import './app/boot';
import routes from './app/routes';
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import moment from 'moment';
import VueSidebarMenu from 'vue-sidebar-menu';
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faCoffee } from '@fortawesome/free-solid-svg-icons';
import { faTimes } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(faCoffee);
library.add(faTimes);

Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.use(VueAxios, axios); 

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('DD/MM/YYYY');
    }
});



Vue.prototype.$axios = axios;

// attach a csrf token to all of our xhr requests
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name=token]').getAttribute('content');

Vue.use(BootstrapVue);

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
