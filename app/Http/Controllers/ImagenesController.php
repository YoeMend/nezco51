<?php

namespace App\Http\Controllers;
@session_start();
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imagenes;
use App\Producto;
use App\Servicio;
use App\Galeria;
class ImagenesController extends Controller
{
	public function index($categoria,$tipo)
	{
		switch ($categoria) {
    	case '1': #producto
    	$producto= Producto::find($tipo);
    	$texto = "Categoría de Imagen: Producto: ".$producto->codigo." ".$producto->titulo;
    	$atras = "producto.index";
    	break;
    	case '2':
    	$servicio = Servicio::find($tipo);
    	$texto = "Categoría de Imagen: Servicio: ".$servicio->titulo;
    	$atras = "servicio.index";
        break;
        case '3':
        $galeria = Galeria::find($tipo);
        $texto = "Categoría de Imagen: Galeria: ".$galeria->nombre;
        $atras = "galeriab.index";
        break;
        default:
    		# code...
        break;
    }
    $imagenes= Imagenes::where('categoria_imagen_id',$categoria)->where('tipo_id',$tipo)->paginate(6);
    return view('backend.imagenes.index')->with('texto',$texto)->with('imagenes',$imagenes)->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras);
  }

  public function create($categoria,$tipo)
  {
	switch ($categoria) {
    	case '1': #producto
    	$producto= Producto::find($tipo);
    	$texto = "Producto: ".$producto->codigo." ".$producto->titulo;
    	$atras = "producto.index";
    	break;
    	case '2':
    	$servicio = Servicio::find($tipo);
    	$texto = "Servicio: ".$servicio->titulo;
    	$atras = "servicio.index";
        break;
        case '3':
        $galeria = Galeria::find($tipo);
        $texto = "Galeria: ".$galeria->nombre;
        $atras = "galeriab.index";
        break;
        default:
    		# code...
        break;

    }
    return view('backend.imagenes.create')->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras)->with('texto',$texto);
  }
  public function store(Request $request) 
  {
	try {

		$imagenes = new Imagenes($request->all());
		$categoria=$request["categoria_imagen_id"];
        $tipo = $request["tipo_id"];
        $url = 'imagenes/index/'.$categoria.'/'.$tipo;
        switch ($categoria) {
        case '1': #producto
        $producto= Producto::find($tipo);
        $texto = "Producto: ".$producto->codigo." ".$producto->titulo;
        $atras = "producto.index";
        break;
        case '2':
        $servicio = Servicio::find($tipo);
        $texto = "Servicio: ".$servicio->titulo;
        $atras = "servicio.index";
        break;
        case '3':
        $galeria = Galeria::find($tipo);
        $texto = "Galeria: ".$galeria->nombre;
        $atras = "galeriab.index";
        break;
        default:
            # code...
        break;

    }

    if($request->archivo){
       $file = $request->file('archivo');
       $categoria = $request->categoria_imagen_id;
       if($categoria==1){    
        $name_file = 'producto_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/img/productos/';
    }
    if($categoria==2){
        $name_file = 'servicio_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/img/servicios/';

    }
    if($categoria==3){
        $name_file = 'galeria_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/img/galeria/';

    }
    if($categoria==4){
        $name_file = 'empresa_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/img/empresa/';

    }
    if(!empty($file_temp)){
        unlink($path.$file_temp);  
    }            
    $file->move($path, $name_file);
    $imagenes->url = $name_file;
}

$imagenes->created_at = date('Y-m-d');
$imagenes->updated_at = date('Y-m-d');
$imagenes->usuario_id = $_SESSION["user"];
$imagenes->save();
 $imagenes= Imagenes::where('categoria_imagen_id',$categoria)->where('tipo_id',$tipo)->paginate(6);
    return view('backend.imagenes.index')->with('texto',$texto)->with('imagenes',$imagenes)->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras);
} catch (Exception $e) {
  \Log::info('Error creating item: '.$e);
  return \Response::json(['created' => false], 500);
  }
 }

public function show($categoria,$tipo,$id){

	switch ($categoria) {
    	case '1': #producto
    	$producto= Producto::find($tipo);
    	$texto = "Producto: ".$producto->codigo." ".$producto->titulo;
    	$atras = "producto.ndex";
    	break;
    	case '2':
    	$servicio = Servicio::find($tipo);
    	$texto = "Servicio: ".$servicio->titulo;
    	$atras = "servicio.index";
        break;
        case '3':
        $galeria = Galeria::find($tipo);
        $texto = "Galeria: ".$galeria->titulo;
        $atras = "galeriab.index";
        break;
        default:
    		# code...
        break;

    }
    $imagenes=Imagenes::find($id);
    return view('backend.imagenes.show')->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras)->with('texto',$texto)->with('imagenes',$imagenes);
}


public function edit($categoria,$tipo,$id){

    switch ($categoria) {
        case '1': #producto
        $producto= Producto::find($tipo);
        $texto = "Producto: ".$producto->codigo." ".$producto->titulo;
        $atras = "producto.ndex";
        break;
        case '2':
        $servicio = Servicio::find($tipo);
        $texto = "Servicio: ".$servicio->titulo;
        $atras = "servicio.index";
        break;
        case '3':
        $galeria = Galeria::find($tipo);
        $texto = "Galeria: ".$galeria->titulo;
        $atras = "galeriab.index";
        break;
        default:
            # code...
        break;

    }
    $imagenes=Imagenes::find($id);
    return view('backend.imagenes.edit')->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras)->with('texto',$texto)->with('imagenes',$imagenes);
}


public function destroy($id)
{

    $imagenes= Imagenes::find($id);
    $tipo = $imagenes->tipo_id;
    $categoria = $imagenes->categoria_imagen_id;
    $filename_old = $imagenes->url;
    if($categoria==1){  
        $path = public_path().'/img/productos/';
        $producto= Producto::find($tipo);
        $texto = "Producto: ".$producto->codigo." ".$producto->titulo;
        $atras="producto.index";
    }    
    if($categoria==2){  
        $servicio = Servicio::find($tipo);
        $texto = "Servicio: ".$servicio->titulo;
        $atras="servicio.index";
        $path = public_path().'/img/servicios/';
    }    
    if($categoria==3){  
        $galeria = Galeria::find($tipo);
        $texto = "Galeria: ".$galeria->titulo;
        $atras="galeriab.index";
        $path = public_path().'/img/galeria/';

    }    
    File::delete($path . $filename_old);
    $imagenes->destroy($id);
    $imagenes= Imagenes::where('categoria_imagen_id',$categoria)->where('tipo_id',$tipo)->paginate(6);
    return view('backend.imagenes.index')->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras)->with('texto',$texto)->with('imagenes',$imagenes);

}

public function principal($id)
{


    $imagenes= Imagenes::where('categoria_imagen_id',$id)->first();
    $tipo = $imagenes->tipo_id;
    return view('backend.imagenes.edit')->with('categoria',$id)->with('imagenes',$imagenes)->with('tipo',$tipo);

}


public function update(Request $request, $id)
{

    try {

        $imagenes = imagenes::find($id);
        $imagenes->fill($request->all());
        $categoria=$request["categoria_imagen_id"];
        $tipo = $request["tipo_id"];
        $url = 'imagenes/index/'.$categoria.'/'.$tipo;
        switch ($categoria) {
        case '1': #producto
        $producto= Producto::find($tipo);
        $texto = "Producto: ".$producto->codigo." ".$producto->titulo;
        $atras = "producto.index";
        break;
        case '2':
        $servicio = Servicio::find($tipo);
        $texto = "Servicio: ".$servicio->titulo;
        $atras = "servicio.index";
        break;
        case '3':
        $galeria = Galeria::find($tipo);
        $texto = "Galeria: ".$galeria->nombre;
        $atras = "galeriab.index";
        break;
        case '5':

        $texto = "Banner Principal: ".$imagenes->nombre;
        $atras = "administrar/home";;
        break;

        default:
            # code...
        break;

    }

    if($request->archivo){

     $file = $request->file('archivo');
     $categoria = $request->categoria_imagen_id;
     $filename_old = $imagenes->url;

     if($categoria==1){    
        $name_file = 'producto_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/img/productos/';
    }
    if($categoria==2){
        $name_file = 'servicio_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/img/servicios/';

    }
    if($categoria==3){
        $name_file = 'galeria_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/img/galeria/';

    }
    if($categoria==4){
        $name_file = 'empresa_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/img/empresa/';

    }
    if($categoria==5){
        $name_file = 'principal_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/img/principal/';

    }

    if(!empty($file_temp)){
        unlink($path.$file_temp);  
    } 

    File::delete($path . $filename_old);     
    $file->move($path, $name_file);
    $imagenes->url = $name_file;
    //$imagenes->url = $name_file;

}
$imagenes->updated_at = date('Y-m-d');
$imagenes->save();


if($categoria==5){
   return view('backend.imagenes.edit')->with('categoria',$id)->with('imagenes',$imagenes)->with('tipo',$tipo);
}
else{
    $imagenes= Imagenes::where('categoria_imagen_id',$categoria)->where('tipo_id',$tipo)->paginate(6);
    return view('backend.imagenes.index')->with('categoria',$categoria)->with('tipo',$tipo)->with('atras',$atras)->with('texto',$texto)->with('imagenes',$imagenes);
}

} catch (Exception $e) {
  \Log::info('Error creating item: '.$e);
  return \Response::json(['created' => false], 500);
}



}

}








