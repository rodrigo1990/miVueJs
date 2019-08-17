<template>

    <div class="container main-div">
        <div class="row content">
            <div class="col-md-4">
                <img v-bind:src="imgProducto" alt="">
            </div>
            <div class="col-md-8">
                <div>
                    <h1>{{headerName}}</h1>

        
                    <p>{{content}}</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {


            console.log('Component mounted.')
        },

        data(){

            return{
            headerName:"La empresa",
            content:"En verdad esto no es una empresa,estoy aprendiendo VueJs. Jeh =D",
            imgProducto:'../assets/img/p1.jpg'
            }
        }
    }
</script>
