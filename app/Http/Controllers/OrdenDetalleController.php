<?php

// App\Http\Controllers\OrdenDetalleController.php
namespace App\Http\Controllers;

use App\Models\OrdenDetalle;
use Illuminate\Http\Request;

class OrdenDetalleController extends Controller
{
    public function index()
    {
        $ordenDetalles = OrdenDetalle::with('orden')->get();
        return view('admin.orden-detalles.index', compact('ordenDetalles'));
    }
}
