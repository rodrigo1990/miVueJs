import Vuex from 'vuex'
import Vue from 'vue';
import { EventBus } from '../bus/event-bus.js';
Vue.use(Vuex)


export const carritoStore = new Vuex.Store({
  state: {

  },
  mutations: {
  	

  	},
  	actions:{
  		agregarACarrito({commit},data){
  		console.log('asd2222asd'+data.id);
  		axios
            .post('/cargarCarrito',{
              id:data.id,
              cantidad:data.cantidad


            })
            .then(function(response){
              console.log(response.data)
            })
  		},
  		eliminarProducto({commit},data){

            console.log("eliminar"+data.id);
            axios
            .post('/eliminarProductoDeCarrito',{
              id:data.id
            })
            .then(function(response){
              console.log(response.data.id);
            })

            
          }



  	}
 
})
