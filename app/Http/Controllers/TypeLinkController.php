<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoaiModel;
use App\List_Type;
class TypeLinkController extends Controller
{
    //
    public function getDanhSach(){
    	$list_Type = List_Type::all();
    	return view('Admin.TypeLink.danhsach', ['list_Type' => $list_Type]);
    }

    public function getThem(){
    	return view('Admin.TypeLink.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, ['link' => 'required|unique:list__types,link'], ['link.required' => 'Tên thể loại không được để trống', 'link.unique' => 'Tên thể loại đã bị trùng']);
        $list_Type = new List_Type;
        $list_Type->link = $request->link;
        $list_Type->status = 0;
        $list_Type->link_ori = 0;
    	$list_Type->save();
    	return redirect('admin/typelink/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id){
    	$list_Type = List_Type::find($id);
    	return view('Admin.TypeLink.sua', ['list_Type' => $list_Type]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request, ['link' => 'required|unique:list__types,link'], ['link.required' => 'Tên thể loại không được để trống', 'link.unique' => 'Tên thể loại đã bị trùng']);
    	$list_Type = List_Type::find($id);
    	$list_Type->link = $request->link;
    	$list_Type->save();
    	return redirect('admin/typelink/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
    	$List_Type = List_Type::find($id);
    	$theloai->delete();
        return redirect('admin/typelink/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
