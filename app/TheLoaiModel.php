<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoaiModel extends Model
{
    //
    protected $table = "theloai";

    public function theloai_tag(){
    	return $this->hasMany('App\TagModel', 'id_TheLoai', 'id');
    }
}
