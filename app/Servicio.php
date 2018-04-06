<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
       protected $table = 'servicio';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','titulo','descripcion','categoria_servicio_id','publico','inicio','posicion','usuario_id'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('App\User');
    }

}
