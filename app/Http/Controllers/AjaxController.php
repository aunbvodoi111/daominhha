<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\TheLoaiModel;
use App\Helper\Tag;

class AjaxController extends Controller
{
    public function getTag(Tag $tag, $idTheLoai){ 
    	$theloai = TheLoaiModel::find($idTheLoai);   	
    	$tag->add($theloai);
    	return redirect('admin/games/them')->with('thongbao', 'Thêm Tag thành công'); 	
    }

    public function getDeleteTag($idTheLoai, Tag $tag){
    	$tag->delete($idTheLoai);
    	return redirect('admin/games/them')->with('thongbao', 'Xóa tag thành công');
    }
}
