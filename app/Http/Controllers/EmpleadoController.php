<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function index(){
        $empleados = Empleado::all();

        return response()->json($empleados);
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:3|max:50',
            'departamento' => 'required|string|min:2|max:50',
            'estado' => 'required|string'
        ]);
        $nuevoEmpleado = Empleado::create([
            'nombre' => $request->nombre,
            'departamento' => $request->departamento,
            'estado' => $request->estado ?? 'Pendiente'
        ]);

        return response()->json($nuevoEmpleado,201);
    }

    public function update(Request $request, $id){
        $empleado = Empleado::find($id);

        if(!$empleado){
            return response() -> json(['mensaje' => 'Empleado no encontrado']);
        }
        $empleado->estado = $request->estado;
        $empleado->save();

        return response() -> json($empleado);
    }

    public function destroy($id){
        $empleado = Empleado::find($id);

        if(!$empleado){
            return response()->json(['mensaje' => 'Empleado no encontrado'], 404);
        }

        $empleado->delete();
        
        return response()->json(['mensaje' => 'Empleado eliminado correctamente']);
    }
}
