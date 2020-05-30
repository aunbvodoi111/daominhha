<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GamesModel;
use App\TheLoaiModel;
use Session;
use App\Helper\Tag;
use App\TagModel;
use App\Link_list;
use App\TitleLink;
use App\List_Type;

class GamesController extends Controller
{
    public function getDanhSach(){
    	//$games = GamesModel::all();
    	$games = GamesModel::select('id', 'Name', 'Email', 'KichThuoc', 'SoPart', 'SoLuotXem', 'AnhChinh', 'AnhMini', 'created_at')->get();
    	return view('Admin.Games.danhsach', ['games' => $games]);
    }

    public function getThem(Tag $tag){
		$theloai = TheLoaiModel::all();
		$list_Type = List_Type::all();
    	return view('Admin.Games.them', ['theloai' => $theloai, 'tag' => $tag, 'list_Type' => $list_Type]);
    }
	public function tagList(Tag $tag){
		$TheLoaiModel = TheLoaiModel::all();
		return response([
			'TheLoaiModel' => $TheLoaiModel
        ]);
	}
    public function postThem(Request $request, Tag $tag){
		// dd($request->all());
    	// $this->validate($request, ['Name' => 'required|unique:games,Name', 'TheLoai' => 'required', 'KichThuoc' => 'required', 'SoPart' => 'required', 'AnhChinh' => 'required', 'AnhPhu1' => 'required', 'AnhPhu2' => 'required', 'AnhPhu3' => 'required', 'AnhPhu4' => 'required', 'GioiThieu' => 'required', 'LinkGame' => 'required'], ['Name.required' => 'Tên game không được để trống', 'Name.unique' => 'Tên game đã bị trùng', 'TheLoai.required' => 'Thể loại không được để trống', 'KichThuoc.required' => 'Kích thước không được để trống', 'SoPart.required' => 'Số part không được để trống', 'AnhChinh.required' => 'Ảnh chính không được để trống', 'AnhPhu1.required' => 'Ảnh phụ 1 không được để trống', 'AnhPhu2.required' => 'Ảnh phụ 2 không được để trống', 'AnhPhu3.required' => 'Ảnh phụ 3 không được để trống', 'AnhPhu4.required' => 'Ảnh phụ 4 không được để trống', 'GioiThieu.required' => 'Giới thiệu không được để trống', 'LinkGame.required' => 'Link game không được để trống']);
		
		$games = new GamesModel;
    	$games->Name = $request->game['Name'];
        $games->TenKhongDau = str_slug($request->game['Name']);
    	$games->TheLoai = $request->game['TheLoai'];
    	$games->KichThuoc = $request->game['KichThuoc'];
    	$games->SoPart = $request->game['SoPart'];
        $games->Series = $request->game['Series'];
        $games->Email = $request->game['Email'];
        $games->MoTa = 1;
        if ($request->CapNhat == "Co") {
            $games->CurrentTime = date('Y-m-d H:i:s');
		}
		$games->Avatar = $request->game['Avatar'];
    	$games->AnhChinh = $request->game['AnhChinh'];
    	$games->AnhPhu1 = $request->game['AnhPhu1'];
    	$games->AnhPhu2 = $request->game['AnhPhu2'];
    	$games->AnhPhu3 = $request->game['AnhPhu3'];
		$games->AnhPhu4 = $request->game['AnhPhu4'];
		$games->AnhMini = $request->game['AnhMini'];
    	$games->GioiThieu = 1;
    	$games->NoiDung = 1;
		$games->LinkGame = 1;
		
		$games->save();
		
		if(isset($request->data)){
			foreach ($request->data as $data) {
				
				$titleLink = new TitleLink;
				
				$titleLink->link  = $data['title'];
				$titleLink->type  = $data['type'];
				$titleLink->id_product  = $games->id;
				$titleLink->type_link  = $data['typelink'];
				$titleLink->save();
				foreach ($data['childLink'] as $item) {
					
					$linkList = new Link_list;
					$linkList->link  = $item['link'];
					$linkList->type  = 1;
					$linkList->id_title  = $titleLink->id;
					$linkList->code  = 1;
					$linkList->save();
				}
			}
		}
    	foreach ($request['listTagName'] as $data) {
    		$themtag = new TagModel;
    		$themtag->TagName = $data['Name'].'-'.$games->Name;
    		$themtag->id_TheLoai = $data['id'];
    		$themtag->id_Games = $games->id;
    		$themtag->save();
		}
		dd(1);
    	Session()->flush();
    	return redirect('admin/games/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id, Tag $tag){
    	$theloai = TheLoaiModel::all();
    	$games = GamesModel::find($id);
    	return view('Admin.Games.sua', ['games' => $games, 'tag' => $tag, 'theloai' => $theloai]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request, ['Name' => 'required|unique:games,Name,'.$id.',id', 'TheLoai' => 'required', 'KichThuoc' => 'required', 'SoPart' => 'required', 'AnhChinh' => 'required', 'AnhPhu1' => 'required', 'AnhPhu2' => 'required', 'AnhPhu3' => 'required', 'AnhPhu4' => 'required', 'GioiThieu' => 'required', 'LinkGame' => 'required'], ['Name.required' => 'Tên game không được để trống', 'Name.unique' => 'Tên game đã bị trùng', 'TheLoai.required' => 'Thể loại không được để trống', 'KichThuoc.required' => 'Kích thước không được để trống', 'SoPart.required' => 'Số part không được để trống', 'AnhChinh.required' => 'Ảnh chính không được để trống', 'AnhPhu1.required' => 'Ảnh phụ 1 không được để trống', 'AnhPhu2.required' => 'Ảnh phụ 2 không được để trống', 'AnhPhu3.required' => 'Ảnh phụ 3 không được để trống', 'AnhPhu4.required' => 'Ảnh phụ 4 không được để trống', 'GioiThieu.required' => 'Giới thiệu không được để trống', 'LinkGame.required' => 'Link game không được để trống']);
    	$games = GamesModel::find($id);
    	$games->Name = $request->Name;
        $games->TenKhongDau = str_slug($request->Name);
    	$games->TheLoai = $request->TheLoai;
    	$games->KichThuoc = $request->KichThuoc;
    	$games->SoPart = $request->SoPart;
        $games->Series = $request->Series;
        $games->Email = $request->Email;
        $games->MoTa = $request->MoTa;
        if ($request->CapNhat == "Co") {
            $games->CurrentTime = date('Y-m-d H:i:s');
		}
		$games->Avatar = $request->Avatar;
    	$games->AnhChinh = $request->AnhChinh;
    	$games->AnhPhu1 = $request->AnhPhu1;
    	$games->AnhPhu2 = $request->AnhPhu2;
    	$games->AnhPhu3 = $request->AnhPhu3;
		$games->AnhPhu4 = $request->AnhPhu4;
		$games->AnhMini = $request->AnhMini;
    	$games->GioiThieu = $request->GioiThieu;
    	$games->NoiDung = $request->NoiDung;
    	$games->LinkGame = $request->LinkGame;
        $tagcurent = TagModel::where('id_Games', $id)->get();
        foreach ($tagcurent as $data) {
            $data->TagName = $data->tag_theloai->Name.'-'.$request->Name;
            $data->save();
        }
		$games->save();
		if(isset($request->link)){
			foreach ($games->link_list as $item) {
				$linkList = Link_list::find($item->id);
				$linkList->delete();
			}
			foreach ($request->link as $data) {
				$linkList = new Link_list;
				$linkList->link  = $data;
				$linkList->type  = 1;
				$linkList->id_product  = $games->id;
				$linkList->code  = 'anh';
				$linkList->save();
			}
		}
    	return redirect('admin/games/sua/'.$id)->with('thongbao', 'Sửa thành công');
    } 

    public function getXoa($id){
        $games = GamesModel::find($id);
        $tag = TagModel::where('id_Games', $id)->get();
        foreach ($tag as $items) {
            $items->delete();
        }
        $games->delete();
        return redirect('admin/games/danhsach')->with('thongbao', 'Xóa thành công');
	}
	
	public function getLinkmn(){
		$list_Type = List_Type::all();
        return view('Admin.Games.link_manager',['list_Type' => $list_Type]);
	}

	public function postChange_status_link(Request $request){
		$list_Type = List_Type::find($request->id);
		if($request->type == 2){
			if($list_Type->status == 0){
				$list_Type->status = 1;
				$list_Type->save();
			}elseif($list_Type->status == 1){
				$list_Type->status = 0;
				$list_Type->save();
			}
		}
		if($request->type == 1){
			if($list_Type->link_ori == 0){
				$list_Type->link_ori = 1;
				$list_Type->save();
			}elseif($list_Type->link_ori == 1){
				$list_Type->link_ori = 0;
				$list_Type->save();
			}
		}
        return response([
			'success' => 'success'
        ]);
	}
	
}
