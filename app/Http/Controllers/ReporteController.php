<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use App\Http\Requests\CarroFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
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
            ->where('cli.nombres','LIKE','%'.$texto.'%')
            //->orwhere('a.codigo','LIKE','%'.$texto.'%')
            ->paginate(10);
        return view('reporte.index', compact('carro','texto'));
    }

}
