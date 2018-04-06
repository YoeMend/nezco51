<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','codigo','titulo','descripcion','categoria_producto_id','tipo_producto_id','publico','inicio','posicion','usuario_id','imagen'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('App\User');
    }

}
