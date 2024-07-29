<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
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
            'nombre' => 'Sandro',
            'direccion' => 'K29',
            'email'=> 'sandrobsa@gmail.com',
            'password' => Hash::make('12345678'),
            'estado'=> 1,
            'role_id'=>1
        ];
        $lista[] = (object) [
            'nombre' => 'Yasminne',
            'direccion' => 'K29',
            'email'=> 'yasminne@gmail.com',
            'password' => Hash::make('12345678'),
            'estado'=> 1,
            'role_id'=>2,
        ];
        

        foreach($lista as $key => $value)
        {
            DB::table('usuarios')->insert([
                'nombre' => $value->nombre,
                'direccion' => $value->direccion,
                'email' => $value->email,
                'password' => $value->password,
                'estado' => $value->estado,
                'role_id' => $value->role_id,
                'created_at' => now(),
            ]);
        }
    }
}
