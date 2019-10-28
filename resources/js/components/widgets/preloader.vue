<template>
	<transition name="fade" mode='out-in'>
	<div v-if="show==true"class="preloader"><div class="spinner-sm spinner-sm-1" id=""> </div></div>
	</transition>
</template>

<script>
import { EventBus } from '../bus/event-bus.js';


    export default {
        mounted() {        
            EventBus.$on('preloader', msg => {
                  this.show=msg;
                });
        },

        data(){
            return{
            	show:false
            }
        },
        methods:{
        }
    }
</script>
