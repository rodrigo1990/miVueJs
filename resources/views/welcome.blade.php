<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo asset('css/app.css') ?>">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

      
    </head>
    <body>
        <div id="app">
            
            
            <header-component v-on:set-show-cart="setShowCart">
            </header-component>
            

            <transition name="fade" mode='out-in'>
                <router-view class="view"  v-on:alertar = "alertar"></router-view>
            </transition>
            <transition name="fade" mode='out-in'>
                 <carrito v-if="showCart"
                          v-on:set-show-cart="setShowCart"
                
                 ></carrito>
             </transition>
            <transition name="fade" mode='out-in'>

             <checkout v-if="showCheckOut"></checkout>

             </transition>




             <alert></alert>
             <confirm></confirm>
            

        </div>



    <script src="<?php echo asset("js/app.js") ?>"></script>
    </body>
</html>
