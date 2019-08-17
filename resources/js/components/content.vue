<template>

    <div class="container main-div">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="">{{headerName}}</div>

                    <div class="">
                        {{content}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            headerName:{
                type:String,
                default:"5"
            },
            content:{
                type:String,
                default:"Esto es el contenido"
            }
        },
        mounted() {


            console.log('Component mounted.')
        },

        data(){

            return{

                
               // content:"Esto es el contenido"
            }
        }
    }
</script>
