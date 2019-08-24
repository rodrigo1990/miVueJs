<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Marca;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function getProductos(){

    	return  Producto::with('Marca')->with('Imagenes')->get();
    }


    public function getBuscarProductos(Request $request){

    	$productos = DB::table('producto')
    							->where('modelo','like','%'.$request->producto.'%')
    							->get();

    	return $productos;
    }
}
