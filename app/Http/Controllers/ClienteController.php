<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

//guia mas dinamica
//https://www.youtube.com/watch?v=VnIKwzysvHM
class ClienteController extends Controller
{
    
    public function index()
    {
        return Cliente::all();
    }

   
    public function store(Request $request)
    {
       // dd($request->all());
        //hacer que los datos sean requeridos
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required'

        ]);

        $cliente = new Cliente;
        //request nombre nos trae el nombre del formulario
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->save();

        return $cliente;
    }

   
    public function show(Cliente $cliente)
    {
        //aqui vamos a solicitar ver los datos de un solo cliente
        //es los mismo $id como parametro a la funcion
        //y luego $cliente = find::($id);
        return $cliente;
    }

   
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required'

        ]);

        //request nombre nos trae el nombre del formulario
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->update();

        return $cliente;
    }

   
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (is_null($cliente)) {
            return response()->json('No se pudo realizar conrrectamente la operacion', 404);
        }
        $cliente->delete();
        return response()->noContent();
    }
}
