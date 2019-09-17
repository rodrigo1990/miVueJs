
<template>
<div class="buscador-cont">
	<input type="text" class="form-control" v-model="input" v-on:keyup="buscar()" placeholder="Ingrese su mensaje aqui">

    <transition name="fade" mode='out-in'> 
	<div v-if="existeProducto">
        
            <div class="result-cont  fadeIn " v-closable="{
                                                    exclude: ['.result-cont'],
                                                    handler: 'setExisteProducto'
                                                  }">
        		<ul>
        			<li v-for="(producto,index) in productos">
                     <router-link v-bind:to="'/producto_detalle/'+producto.id+'/'+producto.marca[0].descripcion+'/'+producto.modelo+'/'+producto.precio">    
                        <div class="description">
                            

                                
                           
                                {{producto.modelo}}
                           

                            <br>

                            <span >
                                {{producto.marca[0].descripcion}}
                            
                            </span>
                            
                             <br>   

                            <span>
                                Categoría: {{producto.categoria[0].descripcion}}
                            </span>

                
                        </div>

                        <div class="img-cont">

                            <div class="img"  v-bind:style="{ backgroundImage: 'url(/img/' + producto.imagenes.nombre_archivo + ')' }" alt=""></div>

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
import {buscadorStore} from '../store/buscadorStore.js'
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
                if(this.input==''){
                    this.existeProducto=false;
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

            		//this.productos = buscadorStore.state.productos

                    //console.log(this.productos)

                    if(productos){
                        this.existeProducto=true
                    }

                }
        	},
            alert:function(id){
                alert(id);
            },
            setExisteProducto:function(){
                this.existeProducto=false
            }
        }
    }
</script>
