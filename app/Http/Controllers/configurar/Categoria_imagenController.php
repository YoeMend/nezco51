<?php

namespace App\Http\Controllers\configurar;
@session_start();

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CategoriaImagen;

class Categoria_imagenController extends Controller
{
    public function index()
    {
        
        $categoriaimagen = CategoriaImagen::orderBy('id', 'ASC')->paginate(6);
        return view('backend.configurar.categoriaimagen.index')->with('categoriaimagen', $categoriaimagen);

    }
    public function create(){
    	return view('backend.configurar.categoriaimagen.crear');
    }

    public function store(Request $request)
    {
        
        try {

            $descripcion = $request["descripcion"];
            //dd($descripcion);
            if(CategoriaImagen::where('descripcion',$descripcion)->first()){
                
            return redirect()->route('categoriaimagen.index')->with("notificacion","Categoría Ya se encuentra Registrada");

            }
            $categoriaimagen = new CategoriaImagen($request->all());
	        $categoriaimagen->created_at = date('Y-m-d');
	        $categoriaimagen->updated_at = date('Y-m-d');
	        $categoriaimagen->usuario_id = $_SESSION["user"];
	        $categoriaimagen->save();
            return redirect()->route('categoriaimagen.index')->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function show($id)
    {
        $categoriaimagen=CategoriaImagen::find($id);
        return view("backend.configurar.categoriaimagen.show")->with("categoriaimagen",$categoriaimagen);
    }

    public function edit($id)
    {
        //$id=decodifica($id);
        $categoriaimagen=CategoriaImagen::find($id);
        return view('backend.configurar.categoriaimagen.edit')->with('categoriaimagen',$categoriaimagen);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'descripcion' => 'required',
            ];

        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
           

            $data=[
                'descripcion' => $request->descripcion,
                'estatus' => $request->estatus,
            ];
            CategoriaImagen::find($id)->update($data);
            return redirect()->route('categoriaimagen.edit', codifica($id))->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function destroy($id)
    {
        
        $categoriaimagen= CategoriaImagen::find($id);
        $categoriaimagen->destroy($id);

            return redirect()->route('categoriaimagen.index');
        
    }



}
