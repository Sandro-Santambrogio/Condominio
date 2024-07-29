<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes'; // Asegúrate de que esto sea correcto

    protected $fillable = [
        'usuario_id', 'estado',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    public function detalles() // Cambia el nombre a 'detalles'
    {
        return $this->hasMany(OrdenDetalle::class, 'orden_id'); // Asumiendo que el campo es 'orden_id'
    }
    public function montoTotal()
    {
        return $this->detalles()->sum('monto_total'); // Usar 'monto_total' para sumar
    }
}
