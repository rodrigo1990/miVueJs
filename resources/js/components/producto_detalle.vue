<template>

    <div class="container main-div">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="">{{marca}}</div>

                    <div class="">
                        {{modelo}}
                    </div>
                    <div v-if="esOferta==1">
                    	${{precio}}
                    </div>
                     <div v-else>
                        <strike> ${{precio}}</strike>
                        <br>
                        ${{666}}
                    </div>
                    <div>
                        <input type="number" name="cantidad" v-model="cantidad">
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
        	id:String
        },
        mounted() {

            axios
              .post('/getProducto',{
                id:this.id,
              })
              .then(response => {
                console.log(response.data);
                this.marca = response.data.marca.descripcion;
                this.modelo = response.data.modelo;
                this.precio = response.data.precio;  
                console.log(response.data.marca.descripcion);
                })
        },

        data(){

            return{
                cantidad:1,
                marca:String,
                modelo:String,
                precio:Number,
                precioDescuento:Number,
                img:String,
                esOferta:Number
                    
               // content:"Esto es el contenido"
            }
        },

        methods:{
          cargarCarrito: function(){
            
            carritoStore.dispatch('agregarACarrito',{
                id:this.id,
                cantidad:this.cantidad
            });

            this.$emit('alertar','Cargaste una '+ this.modelo +' en tu carrito de compras');
          
            EventBus.$emit('contarCarrito', true);
        }
          
        }
    }
</script>
