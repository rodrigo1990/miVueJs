
<template>
<div class="buscador-cont">
	<input type="text" class="form-control" v-model="input" v-on:keyup="buscar()" placeholder="Ingrese su mensaje aqui">


	<div v-if="existeProducto">

        <div class="result-cont">
    		<ul>
    			<li v-for="producto in productos">
                    <a v-on:click="alert(producto.id)">
                        {{producto.modelo}}				
                    </a>

    			</li>
    		</ul>
        </div>

	</div>


	
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

            		buscadorStore.dispatch('buscar',{
            			producto:this.input
            		})

            		this.productos = buscadorStore.state.productos

                    if(this.productos){
                        this.existeProducto=true
                    }

                    console.log(this.productos)
                }
        	},
            alert:function(id){
                alert(id);
            }
        }
    }
</script>
