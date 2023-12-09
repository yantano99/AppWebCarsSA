<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        //
        if ($request)
        {
            $query=trim($request->get('texto'));
            $cliente=DB::table('tblclientes')->where('nombres', 'LIKE','%'.$query.'%')
            ->paginate(10);
            return view('cliente.index', ["cliente"=>$cliente,"texto"=>$query]);
        } 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("cliente.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteFormRequest $request)
    {
        //
        $cliente=new Cliente;
        $cliente->cedula=$request->get('cedula');
        $cliente->nombres=$request->get('nombres');
        $cliente->apellidos=$request->get('apellidos');
        $cliente->direccion=$request->get('direccion');
        $cliente->telefono=$request->get('telefono');
        $cliente->save();
        return Redirect::to('cliente');
    }

    /**
     * Display the specified resource.
     */
    public function show($cedula)
    {
        //
        return view("cliente.show",["cliente"=>Cliente::findOrFail($cedula)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cedula)
    {
        //
        return view("cliente.edit",["cliente"=>Cliente::findOrFail($cedula)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteFormRequest $request, $cedula)
    {
        //
        $cliente=Cliente::findOrFail($cedula);
        $cliente->cedula=$request->get('cedula');
        $cliente->nombres=$request->get('nombres');
        $cliente->apellidos=$request->get('apellidos');
        $cliente->direccion=$request->get('direccion');
        $cliente->telefono=$request->get('telefono');
        $cliente->update();
        return Redirect::to('cliente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cedula)
    {
        //
        $cliente=Cliente::findOrFail($cedula);
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}
