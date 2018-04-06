<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'tipo_producto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','descripcion','categoria_producto_id','estatus','usuario_id'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('App\User');
    }
}
