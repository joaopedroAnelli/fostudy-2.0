/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import VueRouter from 'vue-router';
import VueAxios from 'axios';
import axios from 'axios';
import router from './src/router'
import '../css/app.css'

require('./bootstrap');

window.Vue = require('vue');



Vue.use(VueAxios, axios);
Vue.use(VueRouter)



Vue.use(Vuetify, {
    theme:  {
        primary: '#2196f3',
        secondary: '#3f51b5',
        accent: '#ff5722',
        error: '#f44336',
        warning: '#ffc107',
        info: '#03a9f4',
        success: '#8bc34a',
    }
})




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('master-layout', require('./components/MasterLayout.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue(Vue.util.extend({ router })).$mount('#app');

