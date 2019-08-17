<template>
<div class="carrito-cont ">
    <div class="bkground altura">
        <a class="close-btn" v-on:click="$emit('set-show-cart',mostrarCarrito)">
            <i class="far fa-times-circle"></i>
        </a>
        <div class="anchura">
            <ul>
                <li v-for="producto, key in carrito" :id="producto.id">
                      <a class="close-btn" v-on:click="eliminarProductoDelCarrito(key,producto.id,producto.modelo)"><i class="far fa-times-circle"></i></a>

                    <div v-for="marca in producto.marca">
                        <!-- REF="PRODUCTOCART" => Estoy referenciando al producto como productoCart -->
                        <productoCart
                                v-bind:key="producto.id"
                                v-bind:id="producto.id"
                                v-bind:modelo="producto.modelo"
                                v-bind:marca = "marca.descripcion"
                                v-bind:img = "producto.imagenes.nombre_archivo"
                                v-bind:precio = "producto.precio"
                                ref="productoCart"
                                >
                                    


                        </productoCart>
                    </div>
                    <hr>
                </li>

            </ul>
        </div>
    </div>
</div>
</template>

<script>
import { EventBus } from './bus/event-bus.js';
Vue.component('productoCart', require('./producto_cart.vue').default);
    export default {
        mounted() {


            console.log('Componsent mounted.')
            axios
		      .get('/getCarrito')
		      .then(response => {
		      	this.carrito = response.data
		      	console.log(this.carrito)
		      })


            EventBus.$on('confirmEliminarProductoDeCarrito', data => {
                console.log("desde carrito"+data.idProducto+"");
                  $("li#"+data.idProducto+"").fadeOut();
                });

        },

        data(){

            return{
            carrito:null,
            headerName:"La empresa",
            content:"En verdad esto no es una empresa,estoy aprendiendo VueJs. Jeh =D",
            imgProducto:'../assets/img/p1.jpg',
            mostrarCarrito:false
            }
        },
        methods:{
            eliminarProductoDelCarrito:function(key,id,modelo){
                
                var mensaje = "¿Desea eliminar "+modelo+"?"; 
                
                EventBus.$emit('confirm',{'msg':mensaje,'key':key,'id':id})
                //accedo al metodo de productoCart que eliminara el producto del carrito
                //this.$refs.productoCart[key].eliminarProducto(id);

               // $("li#"+id+"").fadeOut();
            }
        }
    }
</script>
