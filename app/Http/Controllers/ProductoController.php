<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Marca;

class ProductoController extends Controller
{
    public function getProductos(){

    	return  Producto::with('Marca')->with('Imagenes')->get();
    }
}
