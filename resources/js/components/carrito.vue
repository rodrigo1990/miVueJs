<template>
<div class="carrito-cont ">

    <div class="bkground altura">
        <a class="close-btn" v-on:click="$emit('set-show-cart',mostrarCarrito)">
            <i class="far fa-times-circle"></i>
        </a>
        <div class="anchura" >
          <preloader></preloader>
            <ul>
                <li v-for="producto, key in carrito" :id="'p_'+producto.id">
                        
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
                                <h4 v-if="producto.es_oferta==0">
                                    ${{producto.precio}}
                                </h4>
                                 <h4 v-else>
                                    <strike style="float:left"> ${{producto.precio}}</strike>
                                    <br>
                                    ${{producto.precio_descuento}}
                                </h4>
                                    <input  type="number" name="cantidad"  class="form-control cantidadInput"  v-on:input="setCantidad($event,'p_'+producto.id,producto.id)" v-bind:value=" producto.cantidad"> 
                                     <label for="cantidad">unidades</label>
                                

                            </li>


                        </ul>

                    <hr>
                </li>
                <li class="calculate-cont">
                  <div >
                    <table cellpadding="15">
                      <tbody>
                        <tr>
                          <td width="40%" class="text-center"><h4>TOTAL:</h4></td>
                          <td width="60%">
                            <table width="100%">
                              <tbody>
                                <tr>
                                  <td height="5">
                                    <div class="flex">
                                      <p class="blue float-left"><b><i>Subtotal:</i></b></p> 
                                      <p class="blue float-left">&nbsp <b>${{subtotal}}</b></p>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td height="5">
                                    <div class="flex">
                                      <p class="red float-left"><b><i>Descuentos:</i></b></p> 
                                      <p class="red float-left">&nbsp <b>$-{{descuentos}}</b></p>        
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="15">
                                    <hr>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="15">
                                    <h5 class="green text-center">&nbsp <b>${{total}}</b></h5>                            
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <a v-on:click="showCheckOut()" class="btn btn-primary">Pagar</a>
                            
                            


                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </li>
               

            </ul>
        </div>
    </div>
    
</div>
</template>

<script>
Vue.component('preloader', require('./widgets/preloader.vue').default);
import { EventBus } from './bus/event-bus.js';
import { carritoStore } from './store/carritoStore.js';
    export default {
        mounted() {

          EventBus.$emit('preloader',true);
           
          this.getCarrito();

          this.getTotal();

          this.getSubTotal();

          this.getDescuentos();
        
          EventBus.$on('emitirEliminarProductoDeCarrito', data => {
            console.log("desde carrito"+data.idProducto+"");
            //$("li#"+data.idProducto+"").fadeOut();
            });



          EventBus.$on('calcular', data => {
              
              EventBus.$emit('preloader',true);

              Promise.all([this.getCarrito(), this.getTotal(), this.getSubTotal(),this.getDescuentos()])
                .then((allResults) => {
                  
                  setTimeout(function() {
                    EventBus.$emit('preloader',false);
                  }, 2000);
                  
                  
              });
            });


          setTimeout(function() {
            EventBus.$emit('preloader',false);
          }, 1000);


        },

        data(){

            return{
            carrito:null,
            mostrarCarrito:false,
            cantidad:null,
            total:null,
            subtotal:null,
            descuentos:null,
            }
        },
        methods:{
   
          showCheckOut:function(){
            EventBus.$emit('setCheckOut',true);
          },
          getCarrito:function(){
             axios
              .get('/getCarrito')
              .then(response => {
                this.carrito = response.data
              });
          },

          getTotal:function(){

            carritoStore.dispatch('getTotal')
            .then( total => {

              this.total = total;


            }, error =>{
            
              alert(error)
            
            });    

          },
          getSubTotal:function(){

          carritoStore.dispatch('getSubTotal')
          .then( subtotal => {

            this.subtotal = subtotal;

          }, error =>{
          
            alert(error)
          
          });
          
          },


          getDescuentos:function(){

          carritoStore.dispatch('getDescuentos')
            .then( descuentos => {

              this.descuentos = descuentos;

            }, error =>{
            
              alert(error)
            
            });  

          },


          emitirConfirm:function(id,modelo,key){

            var mensaje = "¿Desea eliminar "+modelo+"?"; 
                
            EventBus.$emit('confirm',{'msg':mensaje,'key':key,'id':id})       

          },

          setCantidad:function($event,domId,id){
            
            EventBus.$emit('preloader',true);

            var x = null;

            x = document.querySelectorAll('#'+domId+" .cantidadInput");

            this.cantidad = x[0].value;

            //¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡ CENTRALIZAR EN STORE !!!!!!!!!!!!!!!!!!!!!!!!
            axios
              .post('/updateCantidad',{
                id:id,
                cantidad:this.cantidad
              })
              .then(response => {
                
                //console.log(response.data)
            })

          this.descuentos = false;
          this.subtotal = false;
          this.total = false;

          Promise.all([this.getCarrito(), this.getTotal(), this.getSubTotal(),this.getDescuentos()])
            .then((allResults) => {
              
              setTimeout(function() {
                EventBus.$emit('preloader',false);
              }, 1000);
              
              
          });

        



          }
        }
    }
</script>
