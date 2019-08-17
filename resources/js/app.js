/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import { EventBus } from './components/bus/event-bus.js'

Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('header-component', require('./components/header.vue').default);
Vue.component('carrito', require('./components/carrito.vue').default);
Vue.component('alert', require('./components/widgets/alert.vue').default);
Vue.component('confirm', require('./components/widgets/confirm.vue').default);

const routes = [
  { path: '/content/:headerName/:content', component: require('./components/content.vue').default,props:true },
  { path: '/empresa', component: require('./components/empresa.vue').default },
   { path: '/home', component: require('./components/productos.vue').default },
    { path: '/producto_detalle/:id/:marca/:modelo/:precio', component: require('./components/producto_detalle.vue').default,props:true }
  ];


const router = new VueRouter({
	routes
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
  router,
      data:{
    	showCart:false,
    },
    methods:{
      setShowCart:function(bool){
        this.showCart = bool;
      },
      alertar: function ($msg) {
            
            EventBus.$emit('alertar', $msg);
        }
    }


}).$mount("#app");

