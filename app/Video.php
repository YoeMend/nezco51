<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
     protected $table = 'video';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre','url','categoria_video_id','publico','posicion','usuario_id'];
    protected $guarded  = ['id'];

    public function user(){

    	return $this->belongsTo('App\User');
    }
}
