<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TitleLink extends Model
{
    //
    protected $table = "title_links";
    public function list(){
    	return $this->hasMany('App\Link_list', 'id_title', 'id');
    }
    public function list_type(){
    	return $this->belongsTo('App\List_Type', 'type_link', 'id');
    }
}
