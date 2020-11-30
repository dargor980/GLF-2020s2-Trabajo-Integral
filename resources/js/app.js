require('./bootstrap');
import 'bootstrap/dist/js/bootstrap.bundle.min';
require('particles.js');
window.vis = require('vis');
window.Vue = require('vue');
require('sweetalert');

Vue.component('particles', require('./components/particulas.vue').default);
Vue.component('integrantes', require('./components/IntegrantesComponent.vue').default);
Vue.component('home', require('./components/HomeComponent.vue').default);


const app = new Vue({
    el: '#app',
});