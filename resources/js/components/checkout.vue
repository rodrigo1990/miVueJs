<template>
                
    
<div v-if="show" class="checkout">
	<preloader></preloader>
<div class="container">

    <div class="row">
    	<div class="col-sm-12">
    		<div class="row">
    				<h1 class="float-left">Checkout</h1>
    				<a class=" close-btn" v-on:click="hideCheckout()">
			            <i class="far fa-times-circle"></i>
			        </a>
    			</div>
    	</div>
    		<div class="col-sm-6">
    			
    			<form action="">
    				<div class="row">
    					<h2>Datos personales</h2>
    				</div>
    				<div class="row">
    					<div class="col-sm-12">
	    					<label for="nombre">Nombre</label>
	    					<input type="text" name="nombre" class="form-control">
    					</div>
    				</div>
    				<div class="row">
    					<div class="col-sm-12">
	    					<label for="apellido">Apellido</label>
	    					<input type="text" name="apellido"class="form-control">
    					</div>
    				</div>
    				<div class="row">
    					<div class="col-sm-12">
	    					<label for="documento">Documento</label>
	    					<input type="text" name="documento"class="form-control">
    					</div>
    				</div>
    				<div class="row">
    					<div class="col-sm-12">
    						<label for="email">Email</label>
    						<input type="text" name="email" class="form-control">
    					</div>
    				</div>
    				<div class="row">
    					<h2>Datos de envio</h2>
    				</div>
    				<div class="row">
    					<div class="col-sm-6">
    						<label for="provincia">Provincia</label>
		    					<select  name="provincia"class="form-control">
								<option value="">Seleccione una provincia</option>
	    					</select>
    					</div>
    					<div class="col-sm-6">
    						<label for="ciudad">Ciudad</label>
		    					<select  name="ciudad"class="form-control">
								<option value="">Seleccione una ciudad</option>
	    					</select>
    					</div>
    					<div class="col-sm-12">
    						<label for="codPostal">Codigo postal</label>
    						<input type="text" name="codPostal" class="form-control">
    					</div>
    					<div class="col-sm-12">
    						<label for="direccion">Direccion</label>
    						<input type="text" name="direccion" class="form-control">
    					</div>
    					
    				</div>

    				<div class="row">
    					<div class="col-sm-12">
	    					<label for="codArea">Telefono</label>
	    					<br>
	    					<input type="number" name="codArea"class="form-control float-left" style="width:10%;">
	    					<div class="float-left text-center">
	    						<p class="text-center">-</p>
	    					</div>
	    					<input type="number" name="telefono"class="form-control float-left" style="width:85%;">
    					</div>
    				</div>
    				<div class="row">
    					<a href="" class="btn btn-primary center-block" style="width:100%;">Pagar</a>
    				</div>
    			</form>
    		</div>
    		<div class="col-sm-6">
    			<div class="row">
    				<h2>Facturacion</h2>
    			</div>
    			<div class="row">
    				 <div class="col-sm-6">
    				 	<div class="row" ><h3 class="text-right">Subtotal:</h3></div>
    				 	<div class="row" ><h3 class="text-right">Descuentos:</h3></div>
    				 	<div class="row" ><h3 class="text-right">Total:</h3></div>
    				 </div>
    				 <div class="col-sm-6">
    				 	<div class="row"><h3 class="text-left">${{subtotal}}</h3></div>
    				 	<div class="row"><h3 class="text-left">${{descuentos}}</h3></div>
    				 	<div class="row"><h3 class="text-left">${{total}}</h3></div>
    				 </div>
    			</div>
    		</div>	
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

   
    		console.log('Component mounted.')


    	Promise.all([this.getTotal(), this.getSubTotal(),this.getDescuentos()])
            .then((allResults) => {
              
              setTimeout(function() {
                EventBus.$emit('preloader',false);
              }, 1000);
              
              
          });
        
        },
        beforeCreate(){
        },

        data(){

            return{
            	subtotal:null,
            	descuentos:null,
            	total:null,
            	show:true
            }
        },
        methods:{

        hideCheckout:function(){
        	 EventBus.$emit('setCheckOut',false);

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
        }
    }
</script>