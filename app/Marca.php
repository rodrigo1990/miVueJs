<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='marca';
    public $timestamps = false;


	public function Producto(){
		return $this->belongsTo('App\Producto');
	}

}
