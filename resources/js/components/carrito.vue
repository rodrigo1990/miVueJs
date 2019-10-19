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
                                    <input  type="number" name="cantidad"  class="form-control cantidadInput"  v-on:change="setCantidad(producto.id,key)" v-bind:value=" producto.cantidad"> 
                                     <label for="cantidad">unidades</label>
                                

                            </li>
                        </ul>

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
            mostrarCarrito:false,
            cantidad:null
            }
        },
        methods:{
            


          emitirConfirm:function(id,modelo,key){

            var mensaje = "¿Desea eliminar "+modelo+"?"; 
                
            EventBus.$emit('confirm',{'msg':mensaje,'key':key,'id':id})       

          },

          setCantidad:function(id,key){

            var x = null;

            x = document.getElementsByClassName('cantidadInput');

            this.cantidad = x[key].value;


            //¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡ CENTRALIZAR EN STORE !!!!!!!!!!!!!!!!!!!!!!!!
            axios
              .post('/updateCantidad',{
                id:id,
                cantidad:this.cantidad
              })
              .then(response => {
                console.log(response.data)
            })



          }
        }
    }
</script>
