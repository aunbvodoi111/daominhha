<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    //
    public function getDanhSach(){
    	$users = User::all();
    	return view('Admin.Users.danhsach', ['users' => $users]);
    }

    public function getThem(){
    	return view('Admin.Users.them');
    }

	public function logout(){
		Auth::logout();
  		return redirect('/');
	}
    public function postThem(Request $request){
    	$this->validate($request, ['Name' => 'required|unique:users,name|min:3|max:100', 'Email' => 'required|email|unique:users,email', 'Password' => 'required|min:6', 'PasswordAgain' => 'required|same:Password', 'HinhAnh' => 'image'],['Name.required' => 'Không được để trống tên user', 'Name.unique' => 'Tên user đã bị trùng', 'Name.min' => 'Tên user phải nhiều hơn 3 ký tự', 'Name.max' => 'Tên user không được quá 100 ký tự', 'Email.required' => 'Email không được để trống', 'Email.email' => 'email không hợp lệ', 'Email.unique' => 'Email đã có người sử dụng', 'Password.required' => 'Password không được để trống', 'Password.min' => 'Password phải lớn hơn 6 ký tự', 'PasswordAgain.required' => 'Phải nhập lại password', 'PasswordAgain.same' => 'Password phải trùng nhau', 'HinhAnh.image' => 'Hình ảnh phải là file ảnh']);
    	$users = new User;
    	$users->name = $request->Name;
    	$users->email = $request->Email;
    	$users->password = bcrypt($request->Password);

    	if($request->hasFile('HinhAnh')){
    		$file = $request->file('HinhAnh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect("admin/users/them")->with('loi','Bạn chỉ được upload file là hình ảnh');
    		}
    		// Lấy ra tên của file ảnh
    		$name = $file->getClientOriginalName();
    		// Đặt điều kiện để tên ảnh không trùng nhau
    		$hinh = str_random(4)."_".$name;
    		while(file_exists("public/upload/".$hinh)){
    			$hinh = str_random(4)."_".$name;
    		}
    		// Chuyển file ảnh vào thư mục upload
    		$file->move('public/upload',$hinh);
    		$users->HinhAnh = $hinh;
    	}
    	else{
    		// Nếu người dùng không up file ảnh lên thì chuyển thành rỗng
    		$users->HinhAnh = "";
    	}

    	$users->save();
    	return redirect('admin/user/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id){
    	$users = User::find($id);
    	return view('Admin.Users.sua', ['users' => $users]);
    }

    public function getLogin(){
        return view('Admin.login');
    }

    public function postLogin(Request $request){
        $this->validate($request, ['email' => 'required|email', 'password' => 'required|'], ['email.required' => 'Email không được để trống', 'email.email' => 'Email không hợp lệ', 'password.required' => 'Password không được để trống']);
        if(Auth::attempt(['email'=>$request->email, 'password' => $request->password], $request->has('remember'))){
            return redirect('admin/games/danhsach');
        }
        else {
            return redirect('admin/login')->with('thongbao', 'Email hoặc mật khẩu không đúng');
        }
    }

    public function getInfo(){
        $users = Auth::user();
        return view('Admin.Users.info', ['users' => $users]);
    }

    public function getLogout(){
        Auth::logout();
        return redirect('admin/login');
	}
	public function loginaaa(){
		$background = 2;
        return view('Frontend.Pages.auth',compact('background'));
	}
	public function storeCaptchaForm(Request $request)
    {
		// dd(\Request::ip());
		$this->validate($request, 
		[
			'email' => 'required|unique:users,email', 
			'name' => 'required',
			'password' => 'required|alpha_dash', 
			'password_confirmed' => 'required', 
			'g-recaptcha-response' => 'required|captcha',
			], [
				'name.required' => 'Tên game không được để trống', 
				'g-recaptcha-response.required' => 'Tên game không được để trống', 
				'password' => 'required|confirmed|min:6',
				'password.alpha_dash' => 'Mật khẩu không được có khoảng cách'
			]
		);
		
		$user = new User;
		$user->email = $request->email;
		$user->name = $request->name;
		$user->password = Hash::make($request->password);
		$user->active = 0;
		$user->save();
		$data =[
			'anhquy' => 'asadsa',
			'anhquy222' => 'asadsa',
		];
		\Mail::send('Frontend.mail', $data, function($message) {
			$message->to('abc@gmail.com', 'Tutorials Point')->subject
			   ('Laravel Testing Mail with Attachment');
			$message->attach('C:\laravel-master\laravel\public\uploads\image.png');
			$message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
			$message->from('xyz@gmail.com','Virat Gandhi');
		 });
		 echo "Email Sent with attachment. Check your inbox.";
		return redirect(route('aaaaaaaaa'))->with('status', 'Vui lòng xác nhận tài khoản email');
	}
	
	public function profile(){
        $background = 1;
        return view('Frontend.Pages.profile',compact('background'));
    }
	
	public function changePassword(Request $request){
		$validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
		],
			[
				'current-password.required' => 'Mật khẩu hiện tại không được bỏ trống',
				'new-password.required' => 'Mật khẩu mới không được để trống',
				'new-password.string' => 'Mật khẩu phải là dạng chuỗi',
				'new-password.min' => 'Mật khẩu phải có nhiều hơn 6 kí tự',
				'new-password.confirmed' => 'Mật khẩu xác nhận không khớp',
			]
		);
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Mật khẩu hiện tại của bạn không khớp với mật khẩu bạn cung cấp. Vui lòng thử lại..");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Mật khẩu mới không thể giống như mật khẩu hiện tại của bạn. Vui lòng chọn một mật khẩu khác.");
        }

        

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

	}
	public function addcontact(){
		
	}
}
