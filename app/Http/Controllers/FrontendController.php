<?php

namespace App\Http\Controllers;
@session_start();
use Illuminate\Http\Request;
use DB;
use App\CategoriaDocumentos;
use App\CategoriaProducto;
use App\Producto;
use App\Servicio;
use App\Empresa;
use App\Documentos;
use App\Galeria;
use App\Imagenes;
use App\Video;
use App\TipoProducto;

class FrontendController extends Controller
{
    public function index(){
    	$id=1;
        $imagenes= Imagenes::find($id);
        $_SESSION['banner'] = $imagenes->url;
        //dd($_SESSION['banner']);
    	$servicios = DB::table('servicio')-> where('publico','Si')->where('inicio','1')->orderBy('posicion', 'ASC')-> get();
    	$productos = DB::table('producto')-> where('publico','Si')->where('inicio','1')->orderby('posicion', 'ASC')-> get();
    	$logo_empresa   = DB::table('empresa')-> where('publico','Si')->where('estatus','Activo')-> get();

    	$video   = Video::where('publico','Si')->where('categoria_video_id','1')-> first();

		return view('frontend.index')->with('servicios',$servicios)->with('productos',$productos)->with('logo_empresa',$logo_empresa)->with('video',$video);
	}
	
	public function nosotros(){
		return view('frontend.nosotros');
	}

	public function servicios(){

		$servicios = DB::table('servicio')
								-> where('publico','Si')
								->orderBy('posicion', 'ASC')
								-> get();

		return view('frontend.servicios')->with('servicios',$servicios);
	}

	public function servicios_detail($categoriaid, $id){

		$servicio_detail = DB::table('servicio')->where('id', $id)->first();

		$imagenes = Imagenes::where('publico', 'Si')
					->where('categoria_imagen_id', $categoriaid)
					->where('tipo_id', $id)
					->get();

		//dd($imagenes);
		return view('frontend.servicios_detail')->with('servicio_detail',$servicio_detail)->with('imagenes',$imagenes);
	}
	
	public function productos(){

		$categorias_productos = DB::table('categoria_producto')
								-> where('estatus','Activo')
								-> get();

		$productos = DB::table('producto')->where('publico','Si')->orderBy('posicion', 'ASC')->get();

		$tipo_productos = TipoProducto::where('estatus', 'Activo')->get();

       // $productosFilter = DB::table('producto as a')
       // ->join('tipo_producto as c','a.tipo_producto_id','=','c.id')
       // ->join('categoria_producto as b','a.categoria_producto_id','=','b.id')
       
       // ->select('a.id','a.codigo','a.titulo','a.descripcion as pdescripcion','a.tipo_producto_id','b.descripcion as categoria','b.id as categoriaid', 'c.id as id_tipo', 'c.descripcion as descripcion_tipo')
       // ->where('a.estatus','Activo')
       // ->get();

		return view('frontend.productos')->with('categorias_productos',$categorias_productos)->with('productos',$productos)->with('tipo_productos', $tipo_productos);
	}
	public function productos_detail($id){

		$producto = Producto::where('id', '1')->where('publico','Si')->first();
		
		$productos = Producto::where('publico','Si')->get();

		$categorias_productos = CategoriaProducto::where('estatus','Activo')->get();

		// $tipo_productos = TipoProducto::where('estatus', 'Activo')->get();

		// $imagenes = Imagenes::where('publico', 'Si')->where('categoria_imagen_id', $categoriaid)->where('tipo_id', $id)->get();

			return view('frontend.productos_detail')->with('producto',$producto)->with('categorias_productos',$categorias_productos);

		//->with('tipo_productos', $tipo_productos)->with('imagenes',$imagenes);

	}

	public function leyes(){

		$categorias_documentos = DB::table('categoria_documentos')
								 -> where('estatus','Activo')
								 -> get();

		$documentos = DB::table('documentos')->where('publico', 'Si')->get();
		
		return view('frontend.leyes')->with('categorias_documentos', $categorias_documentos)->with('documentos', $documentos);
	}
	public function leyesF($id){

		$categorias_documentos = DB::table('categoria_documentos')
								 -> where('estatus','Activo')
								 -> get();

		$documentos = DB::table('documentos')->where('categoria_documento_id', $id)->get();

		return view('frontend.leyes')->with('categorias_documentos', $categorias_documentos)->with('documentos', $documentos);
	}

	public function documentDetail($id){

		$documentos = DB::table('documentos')->where('id', $id)->where('publico', 'Si')->first();

		return view('frontend.documentDetail')->with('documentos',$documentos);
	}
	public function galeriaFront(){

		$galerias = Galeria::where('publico','Si')->get();

		$imagenes = Galeria::find(1)->imagenesGalery()->where('categoria_imagen_id','=','3')->first();

		//$imagenes = Imagenes::where('publico', 'Si')->first();

		return view('frontend.galeria')->with('galerias', $galerias)->with('imagenes', $imagenes);
	}
	public function galeria_detail($id_categoria, $id_galeria){

		$imagenes = Imagenes::where('categoria_imagen_id',$id_categoria)->where('tipo_id',$id_galeria)->where('publico','Si')->get();

		$galerias = Galeria::where('publico','Si')->where('id', $id_galeria)->first();

		return view('frontend.galeria_detail')->with('imagenes',$imagenes)->with('galerias', $galerias);
	}
	public function contacto(){
		return view('frontend.contacto');
	}
	public function pruebas(){
		$productos = DB::table('producto')-> where('publico','Si')->where('inicio','1')->orderby('posicion', 'ASC')-> get();

		return view('frontend.pruebas')->with('productos',$productos);
	}
}
