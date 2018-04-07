<?php

namespace App\Http\Controllers\configurar;
@session_start();
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoriaDocumentos;

class Categoria_DocumentoController extends Controller
{
    public function index()
    {
        
      $categoriadocumento = CategoriaDocumentos::orderBy('id', 'ASC')->paginate(6);
      return view('backend.configurar.categoriadocumentos.index')->with('categoriadocumento', $categoriadocumento);

    }
    public function create(){
    	return view('backend.configurar.categoriadocumentos.crear');
    }

    public function store(Request $request)
    {
        
        try {

            $descripcion = $request["descripcion"];
            //dd($descripcion);
            if(CategoriaDocumentos::where('descripcion',$descripcion)->first()){
                
            return redirect()->route('categoriadocumento.index')->with("notificacion","Categoría Ya se encuentra Registrada");

            }
            $categoriadocumento = new CategoriaDocumentos($request->all());
	        $categoriadocumento->created_at = date('Y-m-d');
	        $categoriadocumento->updated_at = date('Y-m-d');
	        $categoriadocumento->usuario_id = $_SESSION["user"];
	        $categoriadocumento->save();
            return redirect()->route('categoriadocumento.index')->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function show($id)
    {
        $categoriadocumento=CategoriaDocumentos::find($id);
        return view('backend.configurar.categoriadocumentos.show')->with('categoriadocumento',$categoriadocumento);
        //
    }

    public function edit($id)
    {
        //$id=decodifica($id);
        $categoriadocumento=CategoriaDocumentos::find($id);
        return view('backend.configurar.categoriadocumentos.edit')->with('categoriadocumento',$categoriadocumento);
    }

    public function update(Request $request, $id)
    {
        $estatus = $request["estatus"];
        $categoriadocumento = CategoriaDocumentos::find($id);
        $categoriadocumento->fill($request->all());
        $categoriadocumento->estatus = $estatus;
        $categoriadocumento->save();
        
      return redirect()->route('categoriadocumento.index')->with("notificacion","Se ha guardado correctamente su información");
    }

    public function destroy($id)
    {
        $categoriadocumento= CategoriaDocumentos::find($id);
        $categoriadocumento->destroy($id);
        return redirect()->route('categoriadocumento.index');        
    }

}
