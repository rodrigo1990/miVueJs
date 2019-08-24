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
          console.log(this.id);
          EventBus.$on('confirmEliminarProductoDeCarrito', data =>{
            if(this.id==data.idProducto){
              console.log("idProducto:"+this.id);
              this.eliminarProducto(this.id);
            }
          });

        },

        data(){
        	return{
               alert:false,
                
              	}
        },

        methods:{
          eliminarProducto:function(id){

            console.log("eliminar"+id);
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