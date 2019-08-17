<template>
	  <div class="producto text-center" >              		
		<div class="img"  v-bind:style="{ backgroundImage: 'url(/img/' + img + ')' }" alt=""></div>
		<h4>

			{{modelo}}
      <br>
      {{marca}}

		</h4>
   <!--   -->

      <router-link v-bind:to="'producto_detalle/'+id+'/'+marca+'/'+modelo+'/'+precio">
        COMPRAR
      </router-link>

  	</div>

</template>


<script>

     export default  {
       

        props:{
          id:Number,
          modelo:String,
          marca:String,
          img:String,
          precio:String,
        },
        mounted() {
        },

        data(){
        	return{
               alert:false,
                
              	}
        }

        }

</script>