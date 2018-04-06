<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaServicio extends Model
{
       protected $table = 'categoria_servicio';

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
