<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaImagen extends Model
{
    protected $table = 'categoria_imagen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','descripcion','estatus','usuario_id'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('App\User');
    }
}
