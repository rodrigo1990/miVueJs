<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='producto';
    public $timestamps = false;

    public function Categoria(){
		return $this->hasMany('App\Categoria','id','categoria_id');
	}


	public function Marca(){
		return $this->hasMany('App\Marca','id','marca_id');
	}


	public function Imagenes(){
		return $this->belongsTo('App\ImagenProducto','id','producto_id');
	}


}

