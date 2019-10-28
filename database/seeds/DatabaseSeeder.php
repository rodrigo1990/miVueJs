<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
   
    	DB::table('marca')
     	->insert([
            'id' => 1,
            'descripcion' => 'Vans'
        ]);

        DB::table('marca')
     	->insert([
            'id' => 2,
            'descripcion' => 'Nike'
        ]);

        DB::table('marca')
     	->insert([
            'id' => 3,
            'descripcion' => 'Running'
        ]);
     	DB::table('marca')
        ->insert([
            'id' => 4,
            'descripcion' => 'Skate'
        ]);


        DB::table('categoria')
     	->insert([
            'id' => 1,
            'descripcion' => 'Calzado'
        ]);

        DB::table('categoria')
     	->insert([
            'id' => 2,
            'descripcion' => 'Calzado'
        ]);

        DB::table('categoria')
     	->insert([
            'id' => 3,
            'descripcion' => 'Calzado'
        ]);
     	DB::table('categoria')
        ->insert([
            'id' => 4,
            'descripcion' => 'Calzado'
        ]);



     	DB::table('producto')
     	->insert([
            'modelo' => 'Old School',
            'marca_id' => 'Vans',
            'precio' => 245.50,
            'precio_descuento' => 150.50,
            'marca_id' => 1,
            'categoria_id' => 1,
            'es_oferta' => 1
        ]);
        DB::table('producto')
     	->insert([
            'modelo' => 'Outburst',
            'marca_id' => 'Nike',
            'precio' => 560.55,
            'marca_id' => 2,
            'categoria_id' => 2,
            'precio_descuento' => 250.50,
            'es_oferta' => 1
        ]);
        DB::table('producto')
     	->insert([
            'modelo' => 'Adidas',
            'marca_id' => 'Running',
            'precio' => 245.50,
            'marca_id' => 3,
            'categoria_id' => 3,
            'precio_descuento' => 180.50,
            'es_oferta' => 1
        ]);
     	DB::table('producto')
        ->insert([
            'modelo' => 'DC',
            'marca_id' => 'Skate',
            'precio' => 1500.99,
            'marca_id' => 4,
            'categoria_id' => 4,
            'precio_descuento' => null,
            'es_oferta' => 0
        ]);


        DB::table('imagen_producto')
     	->insert([
            'nombre_archivo' => 'oldschool.webp',
            'producto_id' => 1,
            'tipo_id' => 0
        ]);
        DB::table('imagen_producto')
        ->insert([
            'nombre_archivo' => 'outburst.webp',
            'producto_id' => 2,
            'tipo_id' => 0
        ]);
        DB::table('imagen_producto')
        ->insert([
            'nombre_archivo' => 'running.webp',
            'producto_id' => 3,
            'tipo_id' => 0
        ]);
        DB::table('imagen_producto')
        ->insert([
            'nombre_archivo' => 'running.webp',
            'producto_id' => 3,
            'tipo_id' => 0
        ]);
        DB::table('imagen_producto')
        ->insert([
            'nombre_archivo' => 'skate.webp',
            'producto_id' => 4,
            'tipo_id' => 0
        ]);
    
    }
}
