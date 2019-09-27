<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    protected $table='imagen_producto';
    public $timestamps = false;


	public function Producto(){
		return $this->belongsTo('App\Producto');
	}
}
