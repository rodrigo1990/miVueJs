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
                                <div v-for="marca in producto.marca">

                                <producto
                                v-bind:key="producto.id"
                                v-bind:id="producto.id"
                                v-bind:modelo="producto.modelo"
                                v-bind:marca = "marca.descripcion"
                                v-bind:img = "producto.imagenes.nombre_archivo"
                                v-bind:precio = "producto.precio"
                               
                                >
                                    


                                </producto>

                                </div>
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


            console.log('Component mounted.')
            axios
		      .get('/get')
		      .then(response => {
		      	this.productos = response.data
		      	console.log(this.productos)
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