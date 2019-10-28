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


    public function getProducto(Request $request){

      return  Producto::with('Marca')->with('Imagenes')->find($request->id);
    }


    public function getBuscarProductos(Request $request){

    	/*$productos = DB::table('producto')
    						->join('imagen_producto','producto.id','imagen_producto.producto_id')
							->where('producto.modelo','like','%'.$request->producto.'%')

    							->get();*/

        $productos = Producto::with('Marca')
                              ->with('Imagenes')
                              ->with('Categoria')
                              ->where('producto.modelo','like','%'.$request->producto.'%')
                              ->get();
    	return $productos;
    }
}
