<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamesModel extends Model
{
    //
    protected $table = "games";

    public function games_tag(){
    	return $this->hasMany('App\TagModel', 'id_Games', 'id');
    }
    public function link_list(){
    	return $this->hasMany('App\TitleLink', 'id_product', 'id');
    }
}
