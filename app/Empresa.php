<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre','descripcion','estatus','publico','usuario_id'];
    protected $guarded  = ['id'];

    public function user(){

        return $this->belongsTo('App\User');
    }
}
