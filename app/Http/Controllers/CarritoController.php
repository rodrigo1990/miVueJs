<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\SessionService;
use App\Producto;

class CarritoController extends Controller
{

	protected $sessionService;


 	function __construct(SessionService $sessionService){

      	$this->sessionService = $sessionService;

    }


    public function cargarCarrito(Request $request){
    		
    	return  $this->sessionService->storeSessionData($request);
    	
    }


    public function getCarrito(){
    	return  $this->sessionService->showSessionData('productos');
    }



    public function eliminarProductoDeCarrito(Request $request){
        return $this->sessionService->eliminarProductoDeCarrito($request);
    }

}
