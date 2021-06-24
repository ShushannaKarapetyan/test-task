import './bootstrap';
import * as Vue from 'vue';
import * as VueRouter from 'vue-router';
import 'es6-promise/auto';
import routes from './router/index';
import VueAuth from '@websanova/vue-auth';
import auth from './auth';
import axios from 'axios';
import VueAxios from 'vue-axios';
import Index from './Index';

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
});

axios.defaults.baseURL = `${baseUrl}/api`;

Vue.createApp(Index)
    .use(router)
    .use(VueAxios, axios)
    .use(VueAuth, auth)
    .mount('#app');
