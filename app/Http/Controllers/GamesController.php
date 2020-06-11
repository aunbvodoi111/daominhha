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
use App\totalGame;
use View;
class GamesController extends Controller
{
	public function __construct(){
        $totalGame = totalGame::find(1);
        View::share('totalGame', $totalGame);
    }
	
    public function getDanhSach(){
    	//$games = GamesModel::all();
    	$games = GamesModel::select('id', 'Name', 'Email', 'KichThuoc', 'SoPart', 'SoLuotXem', 'AnhChinh', 'AnhMini', 'created_at')->get();
    	return view('Admin.Games.danhsach', ['games' => $games]);
    }

    public function getThem(Tag $tag){
    	$theloai = TheLoaiModel::all();
    	return view('Admin.Games.them', ['theloai' => $theloai, 'tag' => $tag]);
    }
	public function tagList(Tag $tag){
		$TheLoaiModel = TheLoaiModel::all();
		return response([
			'TheLoaiModel' => $TheLoaiModel
        ]);
	}

	public function getAddlink($id){
		$theloai = TheLoaiModel::all();
		$listType = List_Type::all();
    	return view('Admin.Games.addlink',compact('theloai','listType','id'));
	}

	public function getEditlink($id){
		$theloai = TheLoaiModel::all();
		$games = GamesModel::where('id',$id)->with('link_list.list')->with('games_tag.tag_theloai')
		->first();
		
		unset($games->NoiDung);
		unset($games->Name);
		unset($games->games_tag);
		unset($games->GioiThieu);
		unset($games->LinkGame);
		$theloai = TheLoaiModel::all();
		$listType = List_Type::all();
	
		
    	return view('Admin.Games.editlink', ['games' => $games, 'theloai' => $theloai, 'listType' => $listType]);
		
	}
	
	public function postEditlink(Request $request,$id){
		$games = GamesModel::find($id);
		foreach ($request->listTagName['link_list'] as $data) {
				
			$titleLink = TitleLink::where('id_product',$games->id)->first();
			
			if($titleLink != null){
				$titleLink->delete();
			}
		}
		foreach ($request->listTagName['link_list'] as $data) { 
			if($data['check'] == 0){
				if($data['havelink'] == 1){
					$titleLink = new TitleLink;
					$titleLink->link  = $data['link'];
					$titleLink->title  = $data['title'];
					$titleLink->type  = $data['type'];
					$titleLink->id_product  = $games->id;
					$titleLink->havelink  = $data['havelink'];
					$titleLink->type_link  = $data['type_link'];
					$titleLink->save();
					foreach ($data['list'] as $item) {
						if($item['check'] == 0){
							$linkList = new Link_list;
							$linkList->link  = $item['link'];
							$linkList->type  = 1;
							$linkList->id_title  = $titleLink->id;
							$linkList->code  = $this->generateRandomString(10).'-'.$this->generateRandomString(5).'-'.$this->generateRandomString(8).'-'.$this->generateRandomString(11);
							$linkList->save();
						}
					}
				}else{
						$titleLink = new TitleLink;
						$titleLink->reason_havelink  = $data['reason_havelink'];
						$titleLink->type  = $data['type'];
						$titleLink->title  = $data['title'];
						$titleLink->havelink  = $data['havelink'];
						$titleLink->id_product  = $games->id;
						$titleLink->type_link  = $data['type_link'];
						$titleLink->save();
				}
			}
		}

		return response()->json(['success'=>'Added new records']);
	}
	
	public function postAddlink(Request $request,$id){
		$games = GamesModel::find($id);
		if(isset($request->data)){
			foreach ($request->data as $data) {
				if($data['havelink'] == 1){
					$titleLink = new TitleLink;
					$titleLink->link  = $data['title'];
					$titleLink->title  = $data['titleMain'];
					$titleLink->type  = $data['type'];
					$titleLink->havelink  = $data['havelink'];
					$titleLink->id_product  = $games->id;
					$titleLink->type_link  = $data['typelink'];
					$titleLink->save();
					foreach ($data['childLink'] as $item) {
						$linkList = new Link_list;
						$linkList->link  = $item['link'];
						$linkList->type  = 1;
						$linkList->id_title  = $titleLink->id;
						$linkList->code  = $this->generateRandomString(10).'-'.$this->generateRandomString(5).'-'.$this->generateRandomString(8).'-'.$this->generateRandomString(11);
						$linkList->save();
					}
				}else{
					
					$titleLink = new TitleLink;
					$titleLink->reason_havelink  = $data['title'];
					$titleLink->type  = $data['type'];
					$titleLink->title  = $data['titleMain'];
					$titleLink->havelink  = $data['havelink'];
					$titleLink->id_product  = $games->id;
					$titleLink->type_link  = $data['typelink'];
					$titleLink->save();
				}
			}
		}
		// dd($request['listTagName']);

		$id = $games->id;
		return response()->json(['success'=>'Added new records']);
	}

	
    public function postThem(Request $request, Tag $tag){
    	$this->validate($request, ['Name' => 'required|unique:games,Name', 'TheLoai' => 'required', 'KichThuoc' => 'required', 'SoPart' => 'required', 'AnhChinh' => 'required', 'AnhPhu1' => 'required', 'AnhPhu2' => 'required', 'AnhPhu3' => 'required', 'AnhPhu4' => 'required', 'GioiThieu' => 'required', 'LinkGame' => 'required'], ['Name.required' => 'Tên game không được để trống', 'Name.unique' => 'Tên game đã bị trùng', 'TheLoai.required' => 'Thể loại không được để trống', 'KichThuoc.required' => 'Kích thước không được để trống', 'SoPart.required' => 'Số part không được để trống', 'AnhChinh.required' => 'Ảnh chính không được để trống', 'AnhPhu1.required' => 'Ảnh phụ 1 không được để trống', 'AnhPhu2.required' => 'Ảnh phụ 2 không được để trống', 'AnhPhu3.required' => 'Ảnh phụ 3 không được để trống', 'AnhPhu4.required' => 'Ảnh phụ 4 không được để trống', 'GioiThieu.required' => 'Giới thiệu không được để trống', 'LinkGame.required' => 'Link game không được để trống']);
    	$games = new GamesModel;
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
    	$games->save();
    	foreach ($tag->items as $data) {
    		$themtag = new TagModel;
    		$themtag->TagName = $data['Name'].'-'.$games->Name;
    		$themtag->id_TheLoai = $data['id'];
    		$themtag->id_Games = $games->id;
    		$themtag->save();
    	}
		Session()->flush();
		$id = $games->id;
    	return redirect('admin/games/addlink/'.$id )->with('thongbao', 'Thêm thành công');
    }

	public function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
	}
	
    public function getSua($id, Tag $tag){
    	$theloai = TheLoaiModel::all();
		$games = GamesModel::where('id',$id)->with('link_list.list')->with('games_tag.tag_theloai')
		->first();
		
		$theloai = TheLoaiModel::all();
		$listType = List_Type::all();
	
		
    	return view('Admin.Games.sua', ['games' => $games, 'tag' => $tag, 'theloai' => $theloai, 'listType' => $listType]);
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
		$id = $games->id;
    	return redirect('admin/games/editlink/'.$id)->with('thongbao', 'Sửa thành công');
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
	
	public function getThemDetail($id){
		$games = GamesModel::find($id);
		return view('Admin.Games.updateDetail',compact('games'));
	}

	public function postThemDetail(Request $request,$id){
		$games = GamesModel::find($id);
		$games->GioiThieu = $request->GioiThieu;
		$games->NoiDung = $request->NoiDung;
		$games->save();
		return redirect('admin/games/themdetail/'.$id)->with('thongbao', 'Sửa thành công');
	}
}