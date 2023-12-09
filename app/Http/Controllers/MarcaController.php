<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MarcaFormRequest;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
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
            $marca=DB::table('tblmarcas')->where('marca', 'LIKE','%'.$query.'%')
            ->paginate(10);
            return view('marca.index', ["marca"=>$marca,"texto"=>$query]);
        } 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("marca.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarcaFormRequest $request)
    {
        //
        $marca=new Marca;
        $marca->marca=$request->get('marca');
        $marca->save();
        return Redirect::to('marca');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return view("marca.show",["marca"=>Marca::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        return view("marca.edit",["marca"=>Marca::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarcaFormRequest $request, $id)
    {
        //
        $marca=Marca::findOrFail($id);
        $marca->marca=$request->get('marca');
        $marca->update();
        return Redirect::to('marca');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $marca=Marca::findOrFail($id);
        $marca->delete();
        return redirect()->route('marca.index');
    }
}
