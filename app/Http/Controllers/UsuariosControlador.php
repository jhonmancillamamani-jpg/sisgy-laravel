<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosControlador extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id','desc')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    public function crear()
    {
        return view('usuarios.crear');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            // ✅ aquí corregido, ya no hay "nombre" como regla inexistente
            'nombre' => 'required|string|unique:usuarios,nombre',
            'password' => 'required|min:6',
            'rol' => 'required|in:admin,empleado,entrenador',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ]);

        return redirect()->route('usuarios.index')->with('ok', 'Usuario creado');
    }

    public function editar(Usuario $usuario)
    {
        return view('usuarios.editar', compact('usuario'));
    }

    public function actualizar(Request $request, Usuario $usuario)
    {
        $request->validate([
            // ✅ corregido también
            'nombre' => 'required|string|unique:usuarios,nombre,' . $usuario->id,
            'rol' => 'required|in:admin,empleado,entrenador',
        ]);

        $datos = $request->only('nombre','rol');

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:6',
            ]);
            $datos['password'] = Hash::make($request->password);
        }

        $usuario->update($datos);

        return redirect()->route('usuarios.index')->with('ok', 'Usuario actualizado');
    }

    public function eliminar(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('ok', 'Usuario eliminado');
    }
}
