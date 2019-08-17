<template>
	  <ul class="flex producto text-center" >  
        <li>            		
    		  <div class="img"  v-bind:style="{ backgroundImage: 'url(/img/' + img + ')' }" alt=""></div>
    		</li>
        <li>
          <h4>
      			{{modelo}}
          </h4>
          <h4>
            {{marca}}

      		</h4>
          <h4>
            ${{precio}}
          </h4>
        </li>
  	</ul>

</template>


<script>
    import { EventBus } from './bus/event-bus.js';

    
     export default  {
       

        props:{
          id:Number,
          modelo:String,
          marca:String,
          img:String,
          precio:String,
        },
        mounted() {

          EventBus.$on('confirmEliminarProductoDeCarrito', data =>{
            this.eliminarProducto(data.idProducto);
          });

        },

        data(){
        	return{
               alert:false,
                
              	}
        },

        methods:{
          cargarCarrito: function(id){
            axios
            .post('/cargarCarrito',{
              id:id

            })
            .then(function(response){
              console.log(response.data)
            })
          },
          eliminarProducto:function(id){


            axios
            .post('/eliminarProductoDeCarrito',{
              id:id
            })
            .then(function(response){
              console.log(response.data);
            })


            EventBus.$emit('contarCarrito', true);
            
          }

        }
        }

</script>