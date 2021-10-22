/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');                     //Porta Bootstrap

window.Vue = require('vue');                //Porta Vue

import App from './components/App.vue';     //Importa il componente App.vue

const app = new Vue({                       //Crea una nuova app che parte dall'ID #root 
    el: '#root',
    render: h => h(App)                     //La home sarà questo componente App
});