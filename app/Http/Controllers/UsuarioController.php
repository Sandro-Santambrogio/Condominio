<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:4',
            'estado' => 'required|integer',
            'role_id' => 'required|integer',
        ]);

        DB::table('usuarios')->insert([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estado' => $request->estado,
            'role_id' => $request->role_id,
            'created_at' => now(),
        ]);

        return redirect()->route('admin.dashboard');
        // return response()->noContent();
    }
}
