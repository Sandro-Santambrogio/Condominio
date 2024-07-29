<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenDetalle extends Model
{
    use HasFactory;

    protected $table = 'orden_detalles'; // Nombre correcto de la tabla

    protected $fillable = [
        'orden_id', 'detalle', 'cantidad', 'monto', 'monto_total', 'estado',
    ];

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }
}
