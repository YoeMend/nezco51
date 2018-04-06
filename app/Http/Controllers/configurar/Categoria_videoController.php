<?php

namespace App\Http\Controllers\configurar;
@session_start();
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoriaVideo;

class Categoria_videoController extends Controller
{
    public function index()
    {
        
        $categoriavideo = CategoriaVideo::orderBy('id', 'ASC')->paginate(6);
        return view('backend.configurar.categoriavideo.index')->with('categoriavideo', $categoriavideo);

    }
    public function create(){
        return view('backend.configurar.categoriavideo.crear');
    }

    public function store(Request $request)
    {
        
        try {

            $descripcion = $request["descripcion"];
            //dd($descripcion);
            if(CategoriaVideo::where('descripcion',$descripcion)->first()){
                
            return redirect()->route('categoriavideo.index')->with("notificacion","Categoría Ya se encuentra Registrada");

            }
            $categoriavideo = new CategoriaVideo($request->all());
            $categoriavideo->created_at = date('Y-m-d');
            $categoriavideo->updated_at = date('Y-m-d');
            $categoriavideo->usuario_id = $_SESSION["user"];
            $categoriavideo->save();
            return redirect()->route('categoriavideo.index')->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function show($id)
    {
        $categoriavideo=CategoriaVideo::find($id);
        return view('backend.configurar.categoriavideo.show')->with('categoriavideo',$categoriavideo);
        //
    }

    public function edit($id)
    {
        //$id=decodifica($id);
        $categoriavideo=CategoriaVideo::find($id);
        return view('backend.configurar.categoriavideo.edit')->with('categoriavideo',$categoriavideo);
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
            CategoriaVideo::find($id)->update($data);
            return redirect()->route('categoriavideo.edit', codifica($id))->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function destroy($id)
    {
        
        $categoriaservicio= CategoriaVideo::find($id);
        $categoriavideo->destroy($id);

            return redirect()->route('categoriavideo.index');
        
    }

}
