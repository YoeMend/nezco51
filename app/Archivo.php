<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = 'archivos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre','documento_id','url','estatus','usuario_id'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('App\User');
    }
}
