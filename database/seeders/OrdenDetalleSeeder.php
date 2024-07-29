<?php

// database/seeders/OrdenDetalleSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Orden;
use App\Models\OrdenDetalle;
use Illuminate\Support\Facades\DB;

class OrdenDetalleSeeder extends Seeder
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
            'orden_id' => '1',
            'detalle' => 'Basurero',
            'cantidad' => '1',
            'monto' => '150',
            'monto_total' => '150',
            'estado'=> '1',
        ];
        $lista[] = (object) [
            'orden_id' => '2',
            'detalle' => 'Basurero',
            'cantidad' => '2',
            'monto' => '150',
            'monto_total' => '300',
            'estado'=> '1',
        ];
        

        foreach($lista as $key => $value)
        {
            DB::table('orden_detalles')->insert([
                'orden_id' => $value->orden_id,
                'detalle' => $value->detalle,
                'cantidad' => $value->cantidad,
                'monto' => $value->monto,
                'monto_total' => $value->monto_total,
                'estado' => $value->estado,
                'created_at' => now(),
            ]);
        }
    }
}
