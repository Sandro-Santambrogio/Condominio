<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['nombre']; // Asegúrate de incluir los campos necesarios

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
