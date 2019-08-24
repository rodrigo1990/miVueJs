<template>

    <div class="container main-div">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="">{{marca}}</div>

                    <div class="">
                        {{modelo}}
                    </div>
                    <div>
                    	${{precio}}
                    </div>
                    <div>
                    	<a class="comprar-btn" v-on:click=" cargarCarrito()"> COMPRAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { EventBus } from './bus/event-bus.js';
import { carritoStore } from './store/carritoStore.js';

    export default {
        props:{
        	id:String,
            marca:String,
            modelo:String,
            precio:String,
            img:String,
        },
        mounted() {


            console.log('Component mounted.')
        },

        data(){

            return{

                
               // content:"Esto es el contenido"
            }
        },

        methods:{
          cargarCarrito: function(){
            
            carritoStore.dispatch('agregarACarrito',{
                id:this.id
            });

            this.$emit('alertar','Cargaste una '+ this.modelo +' en tu carrito de compras');
          
            EventBus.$emit('contarCarrito', true);
        }
          
        }
    }
</script>
