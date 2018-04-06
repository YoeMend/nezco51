<?php

namespace App\Http\Controllers\configurar;
@session_start();
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoriaServicio;

class Categoria_servicioController extends Controller
{
    public function index()
    {
        
        $categoriaservicio = CategoriaServicio::orderBy('id', 'ASC')->paginate(6);
        return view('backend.configurar.categoriaservicio.index')->with('categoriaservicio', $categoriaservicio);

    }
    public function create(){
    	return view('backend.configurar.categoriaservicio.crear');
    }

    public function store(Request $request)
    {
        
        try {

            $descripcion = $request["descripcion"];
            //dd($descripcion);
            if(CategoriaServicio::where('descripcion',$descripcion)->first()){
                
            return redirect()->route('categoriaservicio.index')->with("notificacion","Categoría Ya se encuentra Registrada");

            }
            $categoriaservicio = new CategoriaServicio($request->all());
	        $categoriaservicio->created_at = date('Y-m-d');
	        $categoriaservicio->updated_at = date('Y-m-d');
	        $categoriaservicio->usuario_id = $_SESSION["user"];
	        $categoriaservicio->save();
            return redirect()->route('categoriaservicio.index')->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function show($id)
    {
        $categoriaservicio=CategoriaServicio::find($id);
        return view('backend.configurar.categoriaservicio.show')->with('categoriaservicio',$categoriaservicio);
        //
    }

    public function edit($id)
    {
        //$id=decodifica($id);
        $categoriaservicio=CategoriaServicio::find($id);
        return view('backend.configurar.categoriaservicio.edit')->with('categoriaservicio',$categoriaservicio);
    }

    public function update(Request $request, $id)
    {

        $categoriaservicio = CategoriaServicio::find($id);
        $categoriaservicio->fill($request->all());
        $categoriaservicio->save();
        

      return redirect()->route('categoriaservicio.index')->with("notificacion","Se ha guardado correctamente su información");
    }

    public function destroy($id)
    {
        
        $categoriaservicio= CategoriaServicio::find($id);
        $Categoriaservicio->destroy($id);

            return redirect()->route('categoriaservicio.index');
        
    }

}
