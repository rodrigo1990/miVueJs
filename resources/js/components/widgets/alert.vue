<template>
<div class="alert-cont">
	<transition name="altura" mode='out-in'>
		<div v-if="msg!=null"class="bkground">
            <div class="alert">
                <div class="alert-header">
                    
                </div>
                <div class="alert-body">
                    <h1 class="text-center">{{msg}}</h1>
        			<button v-on:click="msgNull()" class="center-block btn btn-primary">ACEPTAR</button>
                </div>
            </div>
		</div>
	</transition>
</div>
</template>

<script>
import { EventBus } from '../bus/event-bus.js';


    export default {
        mounted() {        
            EventBus.$on('alertar', msg => {
                  this.msg = msg;
                });
        },

        data(){
            return{
      		    msg:null
            }
        },
        methods:{
            msgNull:function(){
                this.msg = null;
            }
        }
    }
</script>
