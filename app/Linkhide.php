<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linkhide extends Model
{
    //
    protected $table = "linkhides";
    public function game_loaded(){
    	return $this->belongsTo('App\GamesModel', 'id_product', 'id');
    }
}
