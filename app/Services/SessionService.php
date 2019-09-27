<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\Producto;


class SessionService
{

   protected $sessionRequest;


   function __construct(Request $sessionRequest){
      $this->sessionRequest=$sessionRequest;
    }


    public function accessSessionData() {

      if($this->sessionRequest->session()->has('user'))
         return "true";
      else
         return "false";
   
   }


   public function storeSessionData($request) {

 //   $request->session()->flush();

      if ($request->session()->has('productos')) {
          
          $productos = $request->session()->get('productos');
          $existe = false;

          if($productos){

            foreach($productos as $key => $producto) {

              if($producto->id == $request->id){

                $existe = true;

                break;

              }

            }


          }


          if($existe!=true){

            $this->searchAndPush($request->id,$request->cantidad);

             $productos = $request->session()->get('productos');

         }


      }else{
        $this->searchAndPush($request->id,$request->cantidad);

        $productos = $request->session()->get('productos');
      }

      return json_encode($productos);

    }


   public function deleteSessionData() {

      $this->sessionRequest->session()->forget('user');

      return "true";
      
   }


   public function showSessionData($data){
      return json_encode($this->sessionRequest->session()->get('productos'));

   }

   public function searchAndPush($productId,$cantidad){
      $producto = Producto::with('Marca')->with('Imagenes')->find($productId);

      $producto->setCantidadAttribute($cantidad);


      $this->sessionRequest->session()->push('productos', $producto);
   }

   public function eliminarProductoDeCarrito(Request $request){
      
      $productos = $request->session()->pull('productos');

      foreach($productos as $key => $producto) {

        if($producto->id == $request->id){

          unset($productos[$key]);

          $request->session()->put('productos',$productos);

          break;
        }
      }

      

      return 'true';

   }


}
