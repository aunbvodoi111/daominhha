<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link_list extends Model
{
    //
    protected $table = "link_lists";
    public function title_link(){
    	return $this->belongsTo('App\TitleLink', 'id_title', 'id');
    }
}
