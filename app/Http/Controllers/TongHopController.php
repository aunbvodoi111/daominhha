<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoaiModel;
use App\Contact;
use App\totalGame;

class TongHopController extends Controller
{
    //

    public function getSua(){
    	$totalGame = totalGame::find(1);
    	return view('Admin.tongHop.sua', ['totalGame' => $totalGame]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request, ['sogame' => 'required'], ['sogame.required' => 'Số game không được bỏ trống']);
    	$totalGame = totalGame::find(1);
		$totalGame->sogame = $request->sogame;
    	$totalGame->password = $request->password;
		$totalGame->copy = $request->copy;
		$totalGame->ip_check = $request->ip_check;
    	$totalGame->save();
    	return redirect('admin/tonghop/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

}
