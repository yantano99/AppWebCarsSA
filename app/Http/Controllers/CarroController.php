<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use App\Http\Requests\CarroFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CarroController extends Controller
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
        $texto=trim($request->get('texto'));
        $carro=DB::table('tblcarros as car')
            ->join('tblmarcas as mar', 'car.marca','=','mar.id')
            ->join('tblclientes as cli', 'car.cliente','=','cli.cedula')
            ->select('car.placa','car.descripcion','car.modelo','car.num_chasis','car.num_motor','mar.marca','cli.nombres','cli.apellidos')
            ->where('car.placa','LIKE','%'.$texto.'%')
            //->orwhere('a.codigo','LIKE','%'.$texto.'%')
            ->paginate(10);
        return view('carro.index', compact('carro','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $marca=DB::table('tblmarcas')->get();
        $cliente=DB::table('tblclientes')->get();
        return view("carro.create",["marca"=>$marca],["cliente"=>$cliente]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response 
     */
    public function store(CarroFormRequest $request)
    {
        //
        $carro=new Carro;
        $carro->placa=$request->input('placa');
        $carro->descripcion=$request->input('descripcion');
        $carro->modelo=$request->input('modelo');
        $carro->num_chasis=$request->input('num_chasis');
        $carro->num_motor=$request->input('num_motor');
        $carro->marca=$request->input('marca');
        $carro->cliente=$request->input('cliente');
        $carro->save();
        return redirect()->route('carro.index');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response 
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response 
     */
    public function edit($placa)
    {
        //
        $carro=Carro::findOrFail($placa);
        $marca=DB::table('tblmarcas')->get();
        $cliente=DB::table('tblclientes')->get();
        return view("carro.edit",["carro"=>$carro, "marca"=>$marca, "cliente"=>$cliente]);  
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response 
     */
    public function update(CarroFormRequest $request, $placa)
    {
        //
        $carro=Carro::findOrFail($placa);
        $carro->placa=$request->input('placa');
        $carro->descripcion=$request->input('descripcion');
        $carro->modelo=$request->input('modelo');
        $carro->num_chasis=$request->input('num_chasis');
        $carro->num_motor=$request->input('num_motor');
        $carro->marca=$request->input('marca');
        $carro->cliente=$request->input('cliente');
        $carro->update();
        return redirect()->route('carro.index');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response 
     */
    public function destroy($placa)
    {
        //
        $carro=Carro::findOrFail($placa);
        $carro->delete();
        return redirect()->route('carro.index');
    }
}
