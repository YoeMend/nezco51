<?php
namespace App\Http\Controllers\Registrar;
@session_start();
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Video;
use App\Servicio;
use App\Empresa;

class VideoController extends Controller
{
	public function index($categoria,$tipo)
	{
		switch ($categoria) {
    	case '2': #producto
    	$empresa= Empresa::find($tipo);
    	$texto = "Categoría de Video: Empresa: ".$empresa->id." ".$empresa->nombre;
    	$atras = "empresa.index";
    	break;
       }
    $video= Video::where('categoria_video_id',$categoria)->where('tipo_id',$tipo)->paginate(6);
    return view('backend.registrar.video.index')->with('texto',$texto)->with('video',$video)->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras);
   }

public function create($categoria,$tipo){

	switch ($categoria) {
    	case '2': #producto
    	$empresa= Empresa::find($tipo);
    	$texto = "Categoría de Video: Empresa: ".$empresa->id." ".$empresa->nombre;
    	$atras = "empresa.index";
    	break;
       }
    $video= Video::where('categoria_video_id',$categoria)->where('tipo_id',$tipo)->paginate(6);
     return view('backend.registrar.video.create')->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras)->with('texto',$texto);
}
public function store(Request $request)
{
    
	try {

		$video = new Video($request->all());
		$categoria=$request["categoria_video_id"];
        $video->categoria_video_id = $categoria;
        $tipo = $request["tipo_id"];
        $inicio = $request["inicio"];
        $video->inicio = $inicio;
        $url = 'video/index/'.$categoria.'/'.$tipo;
        switch ($categoria) {
        case '2': #producto
        
        $video->tipo_id = $tipo; 
        $empresa= Empresa::find($tipo);
        $texto = "Empresa: ".$empresa->id." ".$empresa->nombre;
        $atras = "empresa.index";
        break;
      }
      
     if($request->archivo){
         $file = $request->file('archivo');
         if($categoria==1){    
            $name_file = 'principal_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/video/principal/';
        }
        if($categoria==2){
            $name_file = 'empresa_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/video/empresa/';
        
    }
    if(!empty($file_temp)){
        unlink($path.$file_temp);  
    }            
    $file->move($path, $name_file);
    $video->url = $name_file;
  }

$video->created_at = date('Y-m-d');
$video->updated_at = date('Y-m-d');
$video->usuario_id = $_SESSION["user"];
$video->save();
$video= Video::where('categoria_video_id',$categoria)->where('tipo_id',$tipo)->paginate(6);
return view('backend.registrar.video.index')->with('categoria',$categoria)->with('tipo',$tipo)->with('texto',$texto)->with('atras',$atras)->with("notificacion","Se ha guardado correctamente su información")->with("video",$video);

} catch (Exception $e) {
  \Log::info('Error creating item: '.$e);
  return \Response::json(['created' => false], 500);
}
}

public function show($categoria,$tipo,$id){

	switch ($categoria) {
    	case '2':
    	$empresa = Empresa::find($tipo);
    	$texto = "Empresa: ".$empresa->nombre;
    	$atras = "empresa.index";
        break;
    	default:
    		# code...
    	break;

    }
    $video=Video::find($id);
    return view('backend.registrar.video.show')->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras)->with('texto',$texto)->with('video',$video);
}

public function destroy($id)
{

    $video= Video::find($id);
    $tipo = $video->tipo_id;
    $categoria = $video->categoria_video_id;
    $filename_old = $video->url;
    if($categoria==2){  
        $empresa = Empresa::find($tipo);
        $texto = "Empresa: ".$empresa->nombre;
        $atras="empresa.index";
        $path = public_path().'/video/empresa/';
    }    
    File::delete($path . $filename_old);
    $video->destroy($id);
    $video= Video::where('categoria_video_id',$categoria)->where('tipo_id',$tipo)->paginate(6);
    return view('backend.registrar.video.index')->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras)->with('texto',$texto)->with('video',$video);

}

public function principal($id)
{

    $video= video::where('categoria_video_id',$id)->first();
    return view('backend.registrar.video.edit')->with('categoria',$id)->with('video',$video);

}

public function editar($categoria,$tipo,$id)
{

    switch ($categoria) {
        case '2':
        $empresa = Empresa::find($tipo);
        $texto = "Empresa: ".$empresa->nombre;
        $atras = "empresa.index";
        break;
        default:
            # code...
        break;

    }
    $video=Video::find($id);
    return view('backend.registrar.video.editar')->with('categoria',$categoria)->with('video',$video)->with('tipo',$tipo)->with('texto',$texto);

}

public function update(Request $request, $id)
    {

        $video = video::find($id);

        $video->fill($request->all());
        if ($request->file('archivo')) {
            $filename_old = $video->url;
            $file = $request->file('archivo');
            $name = 'principal_'.time().'.'.$file->getClientOriginalExtension();    
            $path = public_path().'/video/principal/';
            File::delete($path . $filename_old);
            $file->move($path,$name);
            $video->url = $name;
        } 
        $video->save();
        return redirect()->route('videosb.principal', $id)->with("notificacion","Se ha guardado correctamente su información");

    }


public function actualizar(Request $request, $id)
    {
        //dd($request);
        $tipo = $request["tipo_id"];
        $categoria = $request["categoria_video_id"];
        $inicio = $request["inicio"];
        $publico = $request["publico"];

        $cvideo = Video::orderby('id')->get();
        foreach($cvideo as $zvideo){
            $zvideo->inicio = 0;
            $zvideo->update();
        }


        $video = video::find($id);
        $video->fill($request->all());
        $video->inicio = $inicio;
        $video->publico = $publico;
        $video->save();
        switch ($categoria) 
        {
            case '2': #producto
            $empresa= Empresa::find($tipo);
            $texto = "Categoría de Video: Empresa: ".$empresa->id." ".$empresa->nombre;
            $atras = "empresa.index";
            break;
            default:
            break;
         }
    $video= Video::where('categoria_video_id',$categoria)->where('tipo_id',$tipo)->paginate(6);
    return view('backend.registrar.video.index')->with('texto',$texto)->with('video',$video)->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras);

    }

}
