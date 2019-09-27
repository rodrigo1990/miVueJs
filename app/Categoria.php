<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

	protected $table='Categoria';
    public $timestamps = false;


	public function Producto(){
		return $this->hasMany('App\Producto');
	}
}
