<?php

namespace App\Http\Controllers\Registrar;
@session_start();
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoriaDocumentos;
use Storage;
use DB;
use App\Documentos;
use APP\Archivo;
use Laracasts\Flash\Flash; 

class DocumentoController extends Controller
{
    public function index(Request $request)
    {
       $valor = $request["valor"];
      if($valor!=''){
        $documentos = DB::table('documentos as a')
       ->join('categoria_documentos as b','a.categoria_documento_id','=','b.id')
       ->select('a.id','a.nombre','a.descripcion','b.descripcion as descat','a.publico')
       ->where('nombre','LIKE','%'.$valor.'%')
       ->orderBy('a.id','desc')
       ->paginate(6);
      }else{
        $documentos = DB::table('documentos as a')
       ->join('categoria_documentos as b','a.categoria_documento_id','=','b.id')
       ->select('a.id','a.nombre','a.descripcion','b.descripcion as descat','a.publico')
       ->orderBy('a.id','desc')
       ->paginate(6);
      }
      return view('backend.registrar.documentos.index')->with('documento', $documentos);

    }
    public function create(){
    	$categoriadocumento=CategoriaDocumentos::where('estatus','Activo')->orderBy('id')->get();
        return view('backend.registrar.documentos.crear')->with('categoriadocumento',$categoriadocumento);
    }

    public function store(Request $request)
    {

        try {

            $nombre = $request["nombre"];
            $enlace = $request["enlace"];
            //dd($descripcion);
            if(Documentos::where('nombre',$nombre)->first()){

                return redirect()->route('documentos.index')->with("notificacion","Documento Ya se encuentra Registrada");

            }
            $documento = new Documentos($request->all());
            $documento->enlace = $enlace;
            $documento->created_at = date('Y-m-d');
            $documento->updated_at = date('Y-m-d');
            $documento->usuario_id = $_SESSION["user"];
            $documento->save();
            return redirect()->route('documento.index')->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function show($id)
    {
        $documento=Documentos::find($id);
        $idcategoriadocumento = $documento->categoria_documento_id;
        $categoriadocumento=CategoriaDocumentos::where('id',$idcategoriadocumento)->first();
        $descategoria = $categoriadocumento->descripcion;
        return view('backend.registrar.documentos.show')->with('documento',$documento)->with('descategoria',$descategoria);
    }

    public function edit($id)
    {
        //$id=decodifica($id);
        $documento=Documentos::find($id);
        $idcategoriadocumento = $documento->categoria_documento_id;
        $categoriadocumento=CategoriaDocumentos::where('id',$idcategoriadocumento)->first();
        $descategoria = $categoriadocumento->descripcion;
        return view('backend.registrar.documentos.edit')->with('documento',$documento)->with('descategoria',$descategoria);
    }

    public function update(Request $request, $id)
    {

        $documento = Documentos::find($id);

        $documento->fill($request->all());
        $documento->save();
        return redirect()->route('documento.edit', $id)->with("notificacion","Se ha guardado correctamente su información");

    }

    public function destroy($id)
    {

        $documento= Documento::find($id);
        $documento->destroy($id);

        return redirect()->route('documento.index');
        
    }


}
