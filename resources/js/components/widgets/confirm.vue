<template>
<div class="alert-cont">
	<transition name="altura" mode='out-in'>
		<div v-if="msg!=null"class="bkground">
            <div class="alert">
                <div class="alert-header">
                    
                </div>
                <div class="alert-body">
                    <h1 class="text-center">{{msg}}</h1>
        			<button v-on:click="msgNull();eliminarProductoDeCarrito()" class="center-block btn btn-primary">ACEPTAR</button>
                    <button v-on:click="msgNull();" class="center-block btn btn-primary">CANCELAR</button>
                </div>
            </div>
		</div>
	</transition>
</div>
</template>

<script>
import { EventBus } from '../bus/event-bus.js';
    export default {
        props:{
            msg:null,
            idProducto:null,
            keyProducto:null
        },
        mounted() {        
            EventBus.$on('confirm', data => {
                  this.msg = data.msg;
                  this.idProducto= data.id;
                  this.keyProducto = data.key;
                });
        },

        data(){
            return{
      		
            }
        },
        methods:{
            msgNull:function(){
                this.msg = null;
            },
            eliminarProductoDeCarrito:function(){
                EventBus.$emit('confirmEliminarProductoDeCarrito',{'idProducto':this.idProducto,'keyProducto':this.keyProducto});
            }
        }
    }
</script>
