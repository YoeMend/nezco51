<?php

namespace App\Http\Controllers\Registrar;
@session_start();
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Archivo;
use App\Documentos;

class ArchivoController extends Controller
{
	public function index($iddocumento)
	{
		$documento= Documentos::find($iddocumento);
		$texto = "Documento: ".$documento->id." ".$documento->nombre;
		$atras = "documento.index";
		$archivo= Archivo::where('documento_id',$iddocumento)->paginate(6);
		return view('backend.archivo.index')->with('texto',$texto)->with('archivo',$archivo)->with('iddocumento',$iddocumento)->with('atras',$atras);
	}

	public function create($iddocumento){
		$documento= Documentos::find($iddocumento);
		$texto = "Documento: ".$documento->id." ".$documento->nombre;
		$atras = "documento.index";
		return view('backend.archivo.create')->with('iddocumento',$iddocumento)->with('atras',$atras)->with('texto',$texto);
	}
	public function store(Request $request)
	{
		try {

			$zarchivo = new Archivo($request->all());
			$iddocumento=$request["documento_id"];
			$documento= Documentos::find($iddocumento);
			$texto = "Documento: ".$documento->id." ".$documento->nombre;
            
			if($request->file('archivo')){
				$file = $request->file('archivo');
		  	    $name_file = 'documento_'.time().'.'.$file->getClientOriginalExtension();
				$path = public_path().'/documentos/';
				
				if(!empty($file_temp)){
					unlink($path.$file_temp);  
				}            
				$file->move($path, $name_file);
				$zarchivo->url = $name_file;
			}
			$atras="documento.index";
			$zarchivo->created_at = date('Y-m-d');
			$zarchivo->updated_at = date('Y-m-d');
			$zarchivo->usuario_id = $_SESSION["user"];
			$zarchivo->save();
			$zzarchivo= Archivo::where('documento_id',$iddocumento)->paginate(6);
			return view('backend.archivo.index')->with('archivo',$zzarchivo)->with('iddocumento',$iddocumento)->with('texto',$texto)->with('atras',$atras)->with("notificacion","Se ha guardado correctamente su información");

		} catch (Exception $e) {
			\Log::info('Error creating item: '.$e);
			return \Response::json(['created' => false], 500);
		}
	}

	public function show($id){
		$archivo=Archivo::find($id);
		$iddocumento = $archivo->documento_id;
		$documento= Documentos::find($iddocumento);
		$texto = "Documento: ".$documento->id." ".$documento->nombre;

		return view('backend.archivo.show')->with('iddocumento',$iddocumento)->with('texto',$texto)->with('archivo',$archivo);
	}

	public function destroy($id)
	{

		$archivo= Archivo::find($id);
		$iddocumento = $archivo->documento_id;
		$filename_old = $archivo->url;
		$path = public_path().'/documentos/';
		$documento= Documentos::find($iddocumento);
		$texto = "Documento: ".$documento->id." ".$documento->nombre;
		File::delete($path . $filename_old);
		$archivo->destroy($id);
		$archivo= Archivo::where('documento_id',$iddocumento)->paginate(6);
		$atras="documento.index";
		return view('backend.archivo.index')->with('iddocumento',$iddocumento)->with('texto',$texto)->with('archivo',$archivo)->with('atras',$atras);

	}
}
