<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='producto';
    public $timestamps = false;
    protected $append = ['cantidad'];

    public function Categoria(){
		return $this->belongsTo('App\Categoria');
	}


	public function Marca(){
		return $this->belongsTo('App\Marca');
	}


	public function Imagenes(){
		return $this->hasMany('App\ImagenProducto');
	}

	public function getCantidadAttribute()
    {
        return $this->attributes['cantidad'];
    }

    public function setCantidadAttribute($cantidad)
    {
        $this->attributes['cantidad']=$cantidad;
    }


}

