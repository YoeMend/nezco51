<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaDocumentos extends Model
{
    protected $table = 'categoria_documentos';

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
