<?php

namespace App\Http\Controllers\configurar;
@session_start();
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipoProducto;
use App\CategoriaProducto;
use DB;
use PDF;
use Carbon\Carbon;

class Tipo_ProductoController extends Controller
{
    public function index(Request $request)
    {
         $valor=$request["valor"];
         if($valor!=''){
        //$tipoproducto = TipoProducto::orderBy('id', 'ASC')->paginate(6);
         $tipoproducto = DB::table('tipo_producto as a')
                         ->join('categoria_producto as b','a.categoria_producto_id','=','b.id')
                         ->select('a.id','a.descripcion','a.estatus','a.created_at','b.descripcion as categoria')
                         ->where('a.descripcion','LIKE','%'.$valor.'%')
                         ->orderBy('a.id','desc')
                         ->paginate(6);
                     }else{
         $tipoproducto = DB::table('tipo_producto as a')
                         ->join('categoria_producto as b','a.categoria_producto_id','=','b.id')
                         ->select('a.id','a.descripcion','a.estatus','a.created_at','b.descripcion as categoria')
                         ->orderBy('a.id','desc')
                         ->paginate(6);

                     }
        return view('backend.configurar.tipoproducto.index')->with('tipoproducto', $tipoproducto);

    }
    public function create(){
    	$categoriaproducto=CategoriaProducto::where('estatus','Activo')->orderby('descripcion')->get();
    	return view('backend.configurar.tipoproducto.crear')->with('categoriaproducto',$categoriaproducto);
    }

    public function store(Request $request)
    {
        
        try {

            $descripcion = $request["descripcion"];
            if(TipoProducto::where('descripcion',$descripcion)->first()){
                
            return redirect()->route('tipoproducto.index')->with("notificacion","Categoría Ya se encuentra Registrada");

            }
            $tipoproducto = new TipoProducto($request->all());
            $tipoproducto->categoria_producto_id = $request["categoria_producto_id"];
	        $tipoproducto->created_at = date('Y-m-d');
	        $tipoproducto->updated_at = date('Y-m-d');
	        $tipoproducto->usuario_id = $_SESSION["user"];
	        $tipoproducto->save();
            return redirect()->route('tipoproducto.index')->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function show($id)
    {
        $tipoproducto=TipoProducto::find($id);
        $categoriaproducto=CategoriaProducto::where('estatus','Activo')->get();
        return view('backend.configurar.tipoproducto.show')->with('tipoproducto',$tipoproducto)->with('categoriaproducto',$categoriaproducto);
        //
    }

    public function edit($id)
    {
        //$id=decodifica($id);
        $tipoproducto=TipoProducto::find($id);
        $categoriaproducto=CategoriaProducto::where('estatus','Activo')->get();
        return view('backend.configurar.tipoproducto.edit')->with('tipoproducto',$tipoproducto)->with('categoriaproducto',$categoriaproducto);
    }

    public function update(Request $request, $id)
    {
        $estatus=$request["estatus"];
        $tipoproducto = TipoProducto::find($id);
        $tipoproducto->fill($request->all());
        $tipoproducto->estatus = $estatus;
        $tipoproducto->save();
        

      return redirect()->route('tipoproducto.index')->with("notificacion","Se ha guardado correctamente su información");
    }

    public function destroy($id)
    {
        
        $tipoproducto= TipoProducto::find($id);
        $tipoproducto->destroy($id);

         return redirect()->route('tipoproducto.index');
        
    }
}
