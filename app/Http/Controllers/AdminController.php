<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('role')->get();
        return view('admin.dashboard', compact('usuarios'));
    }
}
