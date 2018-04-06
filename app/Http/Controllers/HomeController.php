<?php

namespace App\Http\Controllers;
@session_start();
use Illuminate\Http\Request;
use DB;
use Producto;
use Servicios;
use Documentos;
use Empresa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $producto = DB::table('producto as a')
               ->select(DB::raw('count(*) as prod_cant'))
               ->where('publico','Si')
               ->first();
      $cantidad= $producto->prod_cant;
      $_SESSION["cantidad"] = $cantidad;

    $servicio = DB::table('servicio as a')
               ->select(DB::raw('count(*) as ser_cant'))
               ->where('publico','Si')
               ->first();
      $_SESSION["cantserv"] = $servicio->ser_cant;

    $documentos = DB::table('documentos as a')
               ->select(DB::raw('count(*) as doc_cant'))
               ->where('publico','Si')
               ->first();
      $_SESSION["cantdoc"] = $documentos->doc_cant;

     $empresa = DB::table('empresa as a')
               ->select(DB::raw('count(*) as emp_cant'))
               ->where('publico','Si')
               ->first();
      $_SESSION["cantemp"] = $empresa->emp_cant;

      $zproductos = DB::table('producto')
                ->where('publico','Si')
               ->paginate('6');  
               
      $zservicios = DB::table('servicio')
                ->where('publico','Si')
               ->paginate('6');  

        return view('layouts.inicio')->with('zproductos',$zproductos)->with('zservicio',$zservicios);
        
    }
}
