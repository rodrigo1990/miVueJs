import Vuex from 'vuex'
import Vue from 'vue';
import { EventBus } from '../bus/event-bus.js';
Vue.use(Vuex)


export const buscadorStore = new Vuex.Store({
  state: {
    productos:[]
  },
  mutations: {
  	setProductos(state,productos){
      state.productos = productos;

    }

  	},
  	actions:{
  		buscar({commit},data){
        return new Promise((resolve, reject) => {
          axios
            .get('/getBuscarProductos/'+data.producto+'/')
            .then( response => {
              //commit('setProductos',response.data);

              resolve(response.data)
            }, error => {
              reject(error)
            })
        })
  		
  		}



  	}
 
})
