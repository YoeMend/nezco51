<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    protected $table = 'imagenes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre','url','categoria_imagen_id','tipo_id','estatus','usuario_id','publico','posicion'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('App\User');
    }
}
