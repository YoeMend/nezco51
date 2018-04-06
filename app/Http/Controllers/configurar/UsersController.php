<?php

namespace App\Http\Controllers\configurar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Roles;
class UsersController extends Controller
{
	public function index()
	{
		$usuarios=User::where('id','<>','1')->paginate(20);
		return view('backend.configurar.usuario.index')->with('usuarios',$usuarios);
	}

	public function create()
	{
		$roles=Roles::orderby('id')->get();
		return view('backend.configurar.usuario.create')->with("roles",$roles);
	}

	public function store(Request $request)
	{
		$rules = [
			'email' => 'required|email|unique:users,email',
			'password' => 'required|string|min:6|confirmed',
		];

		try {
			$validator = \Validator::make($request->all(), $rules);
			if ($validator->fails()){
				return back()->withErrors($validator)->withInput();
			}
			$usuario=User::create([
				'name' => $request->name,
				'email' => $request->email,
				'password' => bcrypt($request->password),
				'rol_id' => $request->rol_id,
			]);
			return redirect()->route('usuarios.edit', $usuario->id)->with("notificacion","Se ha guardado correctamente su información");

		} catch (Exception $e) {
			\Log::info('Error creating item: '.$e);
			return \Response::json(['created' => false], 500);
		}
	}

	public function show($id)
	{
        //
	}

	public function edit($id)
	{
		$roles=Roles::orderby('id')->get();
		$usuario=User::find($id);
		return view('backend.configurar.usuario.edit')->with('usuario',$usuario)
		->with('roles',$roles);
	}

	public function update(Request $request, $id)
	{
		$rules = [
			'email' => 'required|email',
		];

		try {
			$validator = \Validator::make($request->all(), $rules);
			if ($validator->fails()){
				return back()->withErrors($validator)->withInput();
			}
			$id=($id);
			$data=[
				'nombre' => $request->nombre,
				'rol_id' => $request->rol_id,
			];
			User::find($id)->update($data);
			return redirect()->route('usuarios.edit', ($id))->with("notificacion","Se ha guardado correctamente su información");

		} catch (Exception $e) {
			\Log::info('Error creating item: '.$e);
			return \Response::json(['created' => false], 500);
		}
	}

	public function destroy($id)
	{
		$id=($id);
		try{
			User::find($id)->delete();
			return redirect()->route('usuarios.index');
		} catch (\Illuminate\Database\QueryException $e) {
			return back()->with("notificacion_error","Se ha producido un error, es probable que exista contenido relacionado a este registro que impide que se elimine");
		}
	}
	public function cambiar($id)
	{
        //dd($id);
		$usuario=User::find(($id));
		return view('backend.configurar.usuario.cambiarp')->with('usuario',$usuario);
	}
	public function update_password(Request $request, $valor)
	{
			//dd($valor);
			$id=($valor);
			$password = bcrypt($request->password);
			$usuarios=User::find($id);
            $usuarios->password = $password;
            $usuarios->save();
            return redirect()->route('usuarios.index')->with("notificacion","Se ha guardado correctamente su información");            
	}
}