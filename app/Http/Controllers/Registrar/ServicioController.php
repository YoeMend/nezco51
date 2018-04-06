<?php

namespace App\Http\Controllers\Registrar;
@session_start();
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoriaServicio;
use Storage;
use App\Servicio;
use APP\Imagenes;
use DB;
use Laracasts\Flash\Flash; 

class ServicioController extends Controller
{
    public function index(Request $request)
    {
       $valor = $request["valor"];
      if($valor!=''){
       $servicio = DB::table('servicio as a')
       ->join('categoria_servicio as b','a.categoria_servicio_id','=','b.id')
       ->select('a.id','a.titulo','a.descripcion','b.descripcion as descat','a.publico', 'a.posicion')
       ->where('titulo','LIKE','%'.$valor.'%')
       ->orderBy('a.id','desc')
       ->paginate(6);

      }else{
       $servicio = DB::table('servicio as a')
       ->join('categoria_servicio as b','a.categoria_servicio_id','=','b.id')
       ->select('a.id','a.titulo','a.descripcion','b.descripcion as descat','a.publico', 'a.posicion')
       ->orderBy('a.id','desc')
       ->paginate(6);
      } 

        return view('backend.registrar.servicio.index')->with('servicio', $servicio);

    }
    public function create(){
    	$categoriaservicio=CategoriaServicio::where('estatus','Activo')->orderBy('id')->get();
        return view('backend.registrar.servicio.crear')->with('categoriaservicio',$categoriaservicio);
    }

    public function store(Request $request)
    {

        try {

            $descripcion = $request["descripcion"];
            $detalles = $request["detalles"];
            $titulo = $request["titulo"];
            $posicion = $request["posicion"];
            //dd($descripcion);
            if(Servicio::where('titulo',$titulo)->first()){

                return redirect()->route('servicio.index')->with("notificacion","Servicio Ya se encuentra Registrada");

            }
            $servicio = new Servicio($request->all());
        
            if($request->archivo){
            $file = $request->file('archivo');
                
            $name_file = 'servicio_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/img/servicios/';
            if(!empty($file_temp)){
            unlink($path.$file_temp);  
            }            
            $file->move($path, $name_file);
            $servicio->imagen = $name_file;
            }
            $servicio->detalles = $detalles;
            $servicio->descripcion = $descripcion;
            $servicio->created_at = date('Y-m-d');
            $servicio->updated_at = date('Y-m-d');
            $servicio->usuario_id = $_SESSION["user"];
            $servicio->save();
            $idg = $servicio->id;
            $cservicio = Servicio::where('id','!=',$idg)->orderby('posicion')->get();
            foreach($cservicio as $cservicio){
              if($cservicio->posicion==$posicion){
                $posicion++;
                $cservicio->posicion = $posicion;
              }
               $cservicio->update();
             }
            return redirect()->route('servicio.index')->with("notificacion","Se ha guardado correctamente su información, Servicio Generado Nro: ".$idg);

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function show($id)
    {
        $servicio=Servicio::find($id);
        $idcategoriaservicio = $servicio->categoria_servicio_id;
        $categoriaservicio=CategoriaServicio::where('id',$idcategoriaservicio)->first();
        $descategoria = $categoriaservicio->descripcion;
        return view('backend.registrar.servicio.show')->with('servicio',$servicio)->with('descategoria',$descategoria);
    }

    public function edit($id)
    {
        //$id=decodifica($id);
        $servicio=Servicio::find($id);
        $idcategoriaservicio = $servicio->categoria_servicio_id;
        $categoriaservicio=CategoriaServicio::where('id',$idcategoriaservicio)->first();
        $descategoria = $categoriaservicio->descripcion;
        return view('backend.registrar.servicio.edit')->with('servicio',$servicio)->with('descategoria',$descategoria);
    }

    public function update(Request $request, $id)
    {

        $detalles = $request["detalles"];
        $posicion = $request["posicion"];
        $descripcion = $request["descripcion"];
        $servicio = Servicio::find($id);
        $actualizar=0;
        if($servicio->posicion!=$posicion){
            $actualizar=1;
        }

        $servicio->fill($request->all());
        if ($request->file('archivo')) {
            $filename_old = $servicio->imagen;
            $file = $request->file('archivo');
            $name = 'servicio_'.time().'.'.$file->getClientOriginalExtension();    
            $path = public_path().'/img/servicios/';
            File::delete($path . $filename_old);
            $file->move($path,$name);
            $servicio->imagen = $name;
        } 
        $servicio->descripcion = $descripcion;
        $servicio->detalles = $detalles;
        $servicio->save();
        if($actualizar==1)
        {
            $cservicio = Servicio::where('id','!=',$id)->orderby('posicion')->get();
            foreach($cservicio as $cservicio){
              if($cservicio->posicion==$posicion){
                $posicion++;
                $cservicio->posicion = $posicion;
                $cservicio->update();
              }
               
             }

        }

        return redirect()->route('servicio.edit', $id)->with("notificacion","Se ha guardado correctamente su información");

    }

    public function destroy($id)
    {

        $servicio= Servicio::find($id);
        $servicio->destroy($id);

        return redirect()->route('servicio.index');
        
    }

}
