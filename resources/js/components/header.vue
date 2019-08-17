
<template>
	<header>
		<nav>
		<div class="row">
			<div class="col-lg-3">
				<h1 class="text-center">
					{{logo}}
				</h1>
			</div>

				<div class="col-lg-7">
						<ul class="flex">
							<li>
								<router-link to="/home">Home</router-link>
							</li>
							<li v-on:mouseover="mostrarSubmenu = true" v-on:mouseleave="mostrarSubmenu = false">
								<a >
									Categorias
								</a>
								
									<transition name="fade">	
										<ul v-if="mostrarSubmenu">
											<li>
												<router-link to="/content/Producto 1/Esto es las descripcion del producto">Producto 1</router-link>
											</li>
											<li>
												<router-link to="/content/Producto 2/Esto es las descripcion del producto">Producto 2</router-link>
											</li>
											<li>
												<router-link to="/content/Producto 3/Esto es las descripcion del producto">Producto 3</router-link>
											</li>
											

										</ul>
									</transition>

								
								
							</li>
							<li>
							<router-link to="/empresa">La empresa</router-link>
							
							</li>
						
			
							
						</ul>

					
				</div>
				<div class="col-lg-2">
					<ul class="flex">
						<li>
							<a class="carrito-btn" v-on:click="$emit('set-show-cart',mostrarCarrito)">
									<i class="fas fa-shopping-cart"></i>
									<div class="cantidad">{{cantidadCarrito}}</div>
							</a>
						</li>
					</ul>
				</div>
			

		</div>	

		</nav>
	</header>
</template>

<script>
import { EventBus } from './bus/event-bus.js';

    export default {	
        mounted() {
            console.log('Component mounted.')
            //traigo el carrito al cargar
             axios
		      .get('/getCarrito')
		      .then(response => {
		      	this.getCarritoContarCantidad(response.data);
		      })
		      //bus que esuchar el evento 'contarCarrito'
		      EventBus.$on('contarCarrito', contar => {
				   axios
				      .get('/getCarrito')
				      .then(response => {
				      	this.getCarritoContarCantidad(response.data);
				      	
				      })
				});
         
        },
        data(){
        	return{
        	carrito:null,
        	logo:"LOGO",
        	mostrarSubmenu:false,
        	mostrarCarrito:true,
        	cantidadCarrito:null,
        	
        	}
        },
        methods:{
        		
        	getCarritoContarCantidad:function(data){

        		this.carrito = data
		      	if(this.carrito){
		      		this.cantidadCarrito = Object.keys(this.carrito).length;
		      	}else{
		      		this.cantidadCarrito = 0;
		      	}
		      	console.log(this.carrito);
		      	console.log(this.cantidadCarrito);
        	}
        }
    }
</script>