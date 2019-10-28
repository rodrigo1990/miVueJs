
<template>
<div class="buscador-cont">
    
	<input type="text" class="form-control" v-model="input" v-on:keyup="buscar()" placeholder="Ingrese su mensaje aqui">

    <transition name="fade" mode='out-in'> 
	<div v-if="existeProducto">
           
            <div class="result-cont  fadeIn  " v-click-outside="hide">
                 <preloader></preloader>
        		<ul>
        			<li v-for="(producto,index) in productos">
                     <router-link v-bind:to="'/producto_detalle/'+producto.id+'/'+producto.marca.descripcion+'/'+producto.modelo+'/'+producto.precio">    
                        <div class="description">
                            

                                
                           
                                {{producto.modelo}}
                           

                            <br>

                            <span >
                                {{producto.marca.descripcion}}
                            
                            </span>
                            
                             <br>   

                            <span>
                                Categoría: {{producto.categoria.descripcion}}
                            </span>

                
                        </div>

                        <div class="img-cont">

                            <div class="img"  v-bind:style="{ backgroundImage: 'url(/img/' + producto.imagenes[0].nombre_archivo + ')' }" alt=""></div>

                        </div>

                     </router-link>
        			</li>
        		</ul>
            </div>
       

	</div>
     </transition>

	
</div>
</template>

<script>
Vue.component('preloader', require('./preloader.vue').default);
import {buscadorStore} from '../store/buscadorStore.js';
import ClickOutside from 'vue-click-outside';
import { EventBus } from '../bus/event-bus.js';

    export default {
        mounted() {        
        	

        },

        data(){
            return{
       			input:null,
            	productos:true,
                existeProducto:false
            }
        },
        methods:{
        	buscar:function(){
                EventBus.$emit('preloader',true);

                if(this.input==''){
                
                    this.existeProducto=false;
                
                    setTimeout(function() {
                    EventBus.$emit('preloader',false);
                  }, 1000);
                
                
                }else{
            		
                    var productos = buscadorStore.dispatch('buscar',{
            			producto:this.input
            		}).then( response => {

                    console.log(response)
                    this.productos = response
                    }, error =>{
                        alert(error)
                    } 
                    )

                    if(productos){
                        this.existeProducto=true;
                        setTimeout(function() {
                    EventBus.$emit('preloader',false);
                  }, 1000);
                    }

                }
        	},
            alert:function(id){
                alert(id);
            },
            hide:function(){
                this.existeProducto=false
            }
        },
        directives: {
            ClickOutside
          }
    }
</script>
