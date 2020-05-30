<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TagModel;
use App\GamesModel;
use App\TheLoaiModel;

class TagController extends Controller
{
    public function getEditTag($idGame){
    	$games = GamesModel::find($idGame);
    	$tagOfGames = $games->games_tag;
    	return view('Admin.Tag.tagofgames', ['tagOfGames' => $tagOfGames, 'games' => $games]);
    }

    public function getThemTag($idGame){
    	$games = GamesModel::find($idGame);
    	$theloai = TheLoaiModel::all();
    	return view('Admin.Tag.them', ['games' => $games, 'theloai' => $theloai]);
    }

    public function postThemTag(Request $request, $idGame){
    	$games = GamesModel::find($idGame);
    	$theloai = TheLoaiModel::find($request->TheLoai);
    	$tagcurent = TagModel::where('id_Games', $idGame)->get();
    	$tag = new TagModel;
    	$tag->TagName = $theloai->Name.'-'.$games->Name;
    	foreach ($tagcurent as $items) {
    		if($tag->TagName == $items->TagName){
    			return redirect('admin/tag/themtag/'.$idGame)->with('loi', 'Tag đã bị trùng');
    		}
    	}
    	$tag->id_Games = $idGame;
    	$tag->id_TheLoai = $request->TheLoai;
    	$tag->save();
    	return redirect('admin/tag/edittag/'.$idGame)->with('thongbao', 'Thêm Tag thành công');   	
    }

    public function getXoaTag($id, $idGame){
    	$tag = TagModel::find($id);
    	$tag->delete();
    	return redirect('admin/tag/edittag/'.$idGame)->with('thongbao', 'Xóa Tag thành công');
    }
}
