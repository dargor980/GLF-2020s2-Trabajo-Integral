require('./bootstrap');
import 'bootstrap/dist/js/bootstrap.bundle.min';
require('particles.js');
window.vis = require('vis');
window.Vue = require('vue');
require('sweetalert');
window.FileSaver = require('file-saver');
window.fs = require('fs-web');
window.$ = window.jQuery= require('jquery');

Vue.component('particles', require('./components/particulas.vue').default);
Vue.component('integrantes', require('./components/IntegrantesComponent.vue').default);
Vue.component('home', require('./components/HomeComponent.vue').default);
Vue.component('integral', require('./components/IntegralComponent.vue').default);

const app = new Vue({
    el: '#app',
});