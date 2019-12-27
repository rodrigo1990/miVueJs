import Vuex from 'vuex'
import Vue from 'vue';
import { EventBus } from '../bus/event-bus.js';
Vue.use(Vuex)


export const carritoStore = new Vuex.Store({
  state: {

  },
  mutations: {
  	
    setCarrito(state,carrito){

    }

  	},
  	actions:{
  		agregarACarrito({commit},data){
  		axios
            .post('/cargarCarrito',{
              id:data.id,
              cantidad:data.cantidad

            })
            .then(function(response){
              commit('setCarrito',response.data);
            })
  		},
  		eliminarProducto({commit},data){
        return new Promise((resolve, reject) => {

            axios
            .post('/eliminarProductoDeCarrito',{
              id:data.id
            })
            .then(function(response){
            })
        });
            
          },
      getTotal:function(){
        return new Promise((resolve, reject) => {
          axios
            .post('/getTotal')
            .then(response => {

              resolve(response.data)

            }, error => {
                reject(error);
            });    
        });
      },
      
      getSubTotal:function(){
        return new Promise((resolve, reject) => {
        axios
          .post('/getSubTotal')
          .then(response => {
            resolve(response.data);
          },error => {
              reject(error)
          });    

        });

      },

      getDescuentos:function(){

        return new Promise((resolve, reject) => {
        axios
          .post('/getDescuentos')
          .then(response => {
            resolve(response.data);
          },error => {
              reject(error)
          });    

        });   

      },

      calculateSubtotal:function({commit},data){
        
        return new Promise((resolve, reject) => {
          
          var subtotal = 0;
        
          data.carrito.forEach(p => {
          if(data.id==p.id){

            if(subtotal==0)
          
              subtotal = p.precio * data.cantidad;
          
            else
          
              subtotal += p.precio * data.cantidad;
          }
          
          });


          resolve(subtotal);
        
        });        
    
      }



  	}
 
})
