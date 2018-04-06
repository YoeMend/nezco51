<?php

namespace App\Http\Controllers\configurar;
@session_start();
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Storage;

use App\Empresa;
use APP\Imagenes;
use Laracasts\Flash\Flash; 

class EmpresaController extends Controller
{
    public function index(Request $request)
    {

      $valor = $request["valor"];
      if($valor!=''){
       $empresa = DB::table('empresa as a')
       ->select('a.id','a.nombre','a.descripcion','a.publico','a.estatus')
       ->where('nombre','LIKE','%'.$valor.'%')
       ->orderBy('a.id','desc')
       ->paginate(6);

      }else{
       $empresa = DB::table('empresa as a')
       ->select('a.id','a.nombre','a.descripcion','a.publico','a.estatus')
       ->orderBy('a.id','desc')
       ->paginate(6);

      }
        return view('backend.configurar.empresa.index')->with('empresa', $empresa);

    }
    public function create(){
        return view('backend.configurar.empresa.crear');
    }

    public function store(Request $request)
    {

        try {

            $descripcion = $request["descripcion"];
            //dd($descripcion);
            if(empresa::where('descripcion',$descripcion)->first()){

                return redirect()->route('empresa.index')->with("notificacion","Empresa Ya se encuentra Registrada");

            }
            $empresa = new empresa($request->all());
        
            if($request->archivo){
            $file = $request->file('archivo');
                
            $name_file = 'empresa_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/img/empresas/';
            if(!empty($file_temp)){
            unlink($path.$file_temp);  
            }            
            $file->move($path, $name_file);
            $empresa->imagen = $name_file;
            }
            $empresa->created_at = date('Y-m-d');
            $empresa->updated_at = date('Y-m-d');
            $empresa->usuario_id = $_SESSION["user"];
            $empresa->save();
            return redirect()->route('empresa.index')->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function show($id)
    {
        $empresa=empresa::find($id);
        return view('backend.configurar.empresa.show')->with('empresa',$empresa);
    }

    public function edit($id)
    {
        //$id=decodifica($id);
        $empresa=empresa::find($id);
        return view('backend.configurar.empresa.edit')->with('empresa',$empresa);
    }

    public function update(Request $request, $id)
    {

        $empresa = empresa::find($id);

        $empresa->fill($request->all());
        if ($request->file('archivo')) {
            $filename_old = $empresa->imagen;
            $file = $request->file('archivo');
            $name = 'empresa_'.time().'.'.$file->getClientOriginalExtension();    
            $path = public_path().'/img/empresas/';
            File::delete($path . $filename_old);
            $file->move($path,$name);
            $empresa->imagen = $name;
        } 
        $empresa->save();
        return redirect()->route('empresa.edit', $id)->with("notificacion","Se ha guardado correctamente su información");

    }

    public function destroy($id)
    {

        $empresa= empresa::find($id);
        $empresa->destroy($id);

        return redirect()->route('empresa.index');
        
    }

}
