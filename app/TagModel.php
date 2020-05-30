<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagModel extends Model
{
    //
    protected $table = "tag";

    public function tag_theloai(){
    	return $this->belongsTo('App\TheLoaiModel', 'id_TheLoai', 'id');
    }

    public function tag_games(){
    	return $this->belongsTo('App\GamesModel', 'id_Games', 'id');
    }
}
