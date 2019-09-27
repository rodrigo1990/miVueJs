<template>
<div class="carrito-cont ">
    <div class="bkground altura">
        <a class="close-btn" v-on:click="$emit('set-show-cart',mostrarCarrito)">
            <i class="far fa-times-circle"></i>
        </a>
        <div class="anchura" >
            <ul>
                <li v-for="producto, key in carrito" :id="producto.id">
                        
                      <a class="close-btn" v-on:click="emitirConfirm(producto.id,producto.modelo,key)"><i class="far fa-times-circle"></i></a>

                        <!-- REF="PRODUCTOCART" => Estoy referenciando al producto como productoCart -->

                        <ul class="flex producto text-center" >  
                            <li>                    
                                <div class="img"  v-bind:style="{ backgroundImage: 'url(/img/' + producto.imagenes[0].nombre_archivo + ')' }" alt=""></div>
                            </li>
                            <li>
                                <h4>
                                    {{producto.modelo}}
                                </h4>
                                <h4>
                                    {{producto.marca.descripcion}}

                                </h4>
                                <h4>
                                    ${{producto.precio}}
                                </h4>
                                    <input type="number" name="cantidad" class="form-control" v-bind:value=" producto.cantidad"> 
                                     <label for="cantidad">unidades</label>
                                

                            </li>
                        </ul>

                      <!--    <productoCart
                                v-bind:key="producto.id"
                                v-bind:id="producto.id"
                                v-bind:modelo=""
                                v-bind:marca = ""
                                v-bind:img = ""
                                v-bind:precio = ""
                                ref="productoCart"
                                >
                                    


                        </productoCart>-->
                    <hr>
                </li>

            </ul>
        </div>
    </div>
    
</div>
</template>

<script>
import { EventBus } from './bus/event-bus.js';
import { carritoStore } from './store/carritoStore.js';
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


            EventBus.$on('emitirEliminarProductoDeCarrito', data => {
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
            


          emitirConfirm:function(id,modelo,key){

            var mensaje = "¿Desea eliminar "+modelo+"?"; 
                
            EventBus.$emit('confirm',{'msg':mensaje,'key':key,'id':id})



            

          }
        }
    }
</script>
