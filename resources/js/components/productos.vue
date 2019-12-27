<template>
    <div class="container main-div">
        <div class="row">
            <div class="col-md-12">
                <div class="">

                    <div class="header">
                        <h2>Productos</h2>
                    </div>
                    <div class="body">
                        <ul class="flex">
                            <li v-for="producto in productos">

                                <producto
                                v-bind:key="producto.id"
                                v-bind:id="producto.id"
                                v-bind:modelo="producto.modelo"
                                v-bind:marca="producto.marca.descripcion"
                                v-bind:img = "producto.imagenes[0].nombre_archivo"
                                v-bind:precio = "producto.precio"
                               
                                >
                                    


                                </producto>

                             </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
Vue.component('producto', require('./producto.vue').default);

    export default {

        props:{
           
        },
        mounted() {

            axios
		      .get('/get')
		      .then(response => {
		      	this.productos = response.data
		      })


        },

        data(){

            return{
                productos:null
               // content:"Esto es el contenido"
            }
        },
         methods:{
            
       
        }
    }
</script>