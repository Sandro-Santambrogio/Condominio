<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
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
            'nombre' => 'admin', 
        ];
        $lista[] = (object) [
            'nombre' => 'usuario',
        ];
        

        foreach($lista as $key => $value)
        {
            DB::table('roles')->insert([
                'nombre' => $value->nombre,
                'created_at' => now(),
            ]);
        }
    }
}
