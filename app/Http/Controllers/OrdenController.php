<?php

// app/Http/Controllers/OrdenController.php
namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function index()
    {
        $ordenes = Orden::with('usuario','detalles')->get(); // Carga la relación 'usuario'
        return view('admin.ordenes.index', compact('ordenes'));
    }
    
}
