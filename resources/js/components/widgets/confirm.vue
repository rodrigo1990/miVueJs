<template>
<div class="confirm alert-cont">
	<transition name="altura" mode='out-in'>
		<div v-if="msg!=null"class="bkground">
            <div class="alert">
                <div class="alert-header">
                    
                </div>
                <div class="alert-body">
                    <h1 class="text-center">{{msg}}</h1>
        			<button v-on:click="msg = null;eliminarProducto();emitirEliminarProducto();" class="center-block btn btn-primary">ACEPTAR</button>
                    <button v-on:click="msg = null;" class="center-block btn btn-primary">CANCELAR</button>
                </div>
            </div>
		</div>
	</transition>
</div>
</template>

<script>
import { EventBus } from '../bus/event-bus.js';
import {carritoStore} from '../store/carritoStore.js';
    export default {
        props:{
            
        },
        mounted() {        
            EventBus.$on('confirm', data => {
                  this.msg = data.msg;
                  this.idProducto= data.id;
                  this.keyProducto = data.key;

                  console.log("Desde confirm"+this.idProducto)
                });
        },

        data(){
            return{
      		    msg:null,
                idProducto:null,
                keyProducto:null
            }
        },
        methods:{

            eliminarProducto:function(){

                carritoStore.dispatch('eliminarProducto',{
                    id:this.idProducto
                })
                
            },
            emitirEliminarProducto:function(){
                
                EventBus.$emit('emitirEliminarProductoDeCarrito',{'idProducto':this.idProducto});
                
                EventBus.$emit('contarCarrito', true);

                EventBus.$emit('calcular', true);


            },
        }
    }
</script>
