<?php

// database/seeders/OrdenSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Orden;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lista = [];

        $lista[] = (object) [
            'usuario_id' => '2',
            'fecha' => now()->format('Y-m-d'),
            'estado'=> '1',
        ];
        $lista[] = (object) [
            'usuario_id' => '2',
            'fecha' => now()->format('Y-m-d'),
            'estado'=> '1',
        ];
        

        foreach($lista as $key => $value)
        {
            DB::table('ordenes')->insert([
                'usuario_id' => $value->usuario_id,
                'fecha' => $value->fecha,
                'estado' => $value->estado,
                'created_at' => now(),
            ]);
        }
    }
}
