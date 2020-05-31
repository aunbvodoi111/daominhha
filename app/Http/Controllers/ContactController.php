<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoaiModel;
use App\Contact;

class ContactController extends Controller
{
    //
    public function getDanhSach(){
    	$contact = Contact::all();
    	return view('Admin.Contact.danhsach', ['contact' => $contact]);
    }

    public function getThem(){
    	return view('Admin.Contact.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, ['Name' => 'required|unique:theloai,Name'], ['Name.required' => 'Tên thể loại không được để trống', 'Name.unique' => 'Tên thể loại đã bị trùng']);
    	$theloai = new TheLoaiModel;
    	$theloai->Name = $request->Name;
    	$theloai->TenKhongDau = str_slug($request->Name);
    	$theloai->save();
    	return redirect('admin/theloai/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id){
    	$theloai = TheLoaiModel::find($id);
    	return view('Admin.TheLoai.sua', ['theloai' => $theloai]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request, ['Name' => 'required|unique:theloai,Name,'.$id.',id'], ['Name.required' => 'Tên thể loại không được để trống', 'Name.unique' => 'Tên thể loại đã bị trùng với tên khác trong cơ sở dữ liệu']);
    	$theloai = TheLoaiModel::find($id);
    	$theloai->Name = $request->Name;
    	$theloai->TenKhongDau = str_slug($request->Name);
    	$theloai->save();
    	return redirect('admin/theloai/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
    	$theloai = TheLoaiModel::find($id);
    	if(count($theloai->theloai_tag) > 0)
        {
            return redirect('admin/theloai/danhsach')->with('loi', 'Không thể xóa thể loại do đã được gắn tag');
        }
        else{
            $theloai->delete();
            return redirect('admin/theloai/danhsach')->with('thongbao', 'Xóa thành công');
        }   
    }
}
