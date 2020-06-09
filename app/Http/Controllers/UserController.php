<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\GamesModel;
use App\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetMailable;
use App\Mail\SendMailable;
use Validator;
use App\totalGame;
use View;
use App\UserIp;
class UserController extends Controller
{
	//
	
	public function __construct(){
        $totalGame = totalGame::find(1); 
        $link_loaded = [];
        $id_loaded = 0;
        $this->middleware(function ($request, $next) {
     
            if(\Auth::user()){
                $link_loaded = User::find(\Auth::user()->id);
                View::share('link_loaded', $link_loaded);
            }
            
            return $next($request);
        });
        
        View::share('totalGame', $totalGame);
        
    }
    public function getDanhSach(){
    	$users = User::all();
    	return view('Admin.Users.danhsach', ['users' => $users]);
    }

    public function getThem(){
    	return view('Admin.Users.them');
    }

	public function logout(){
		Auth::logout();
  		return redirect('/profile');
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

    // public function postLogin(Request $request){
    //     $this->validate($request, ['email' => 'required|email', 'password' => 'required|'], ['email.required' => 'Email không được để trống', 'email.email' => 'Email không hợp lệ', 'password.required' => 'Password không được để trống']);
    //     if(Auth::attempt(['email'=>$request->email, 'password' => $request->password], $request->has('remember'))){
    //         return redirect('admin/games/danhsach');
    //     }
    //     else {
    //         return redirect('admin/login')->with('thongbao', 'Email hoặc mật khẩu không đúng');
    //     }
    // }

	public function postLogin(Request $request){
		$validator = Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required|'], ['email.required' => 'Email không được để trống', 'email.email' => 'Email không hợp lệ', 'password.required' => 'Password không được để trống']);
			$ip_check = totalGame::where('id',1)->first();
			$user = User::where('email',$request->email)->first();
			if($user){
				$check = 0;
				$ip = UserIp::where('id_user',$user->id)->get();
				// dd(count($ip));
				foreach($ip as $name){
					if($name->ip_user == \Request::ip()){
						$check = 1;
					}
				}
				if($check == 0){
					if(count($ip) < ($ip_check->ip_check)){
						if($check == 0){
							$ipAdd = new UserIp;
							$ipAdd->ip_user = \Request::ip();
							$ipAdd->id_user = $user->id;
							$ipAdd->save();
							if($user->active_mail == 0){
								return response()->json(['er1'=>'Added new records.']);
							}else if($user->active == 0){
								return response()->json(['er2'=>'Added new records.']);
							}else{
								if(Auth::attempt(['email'=>$request->email, 'password' => $request->password], $request->has('remember'))){
									return response()->json(['success'=>'Added new records.']);
								}else{
									return response()->json(['errorr'=>'Vui lòng kiểm tra lại tải khoản mật khẩu']);
								}
							}
						}
						
					}else{
						return response()->json(['errorIp'=>'Added new records.']);
					}
				}else if($check == 1){
					if($user->active_mail == 0){
						return response()->json(['er1'=>'Added new records.']);
					}else if($user->active == 0){
						return response()->json(['er2'=>'Added new records.']);
					}else{
						if(Auth::attempt(['email'=>$request->email, 'password' => $request->password], $request->has('remember'))){
							return response()->json(['success'=>'Added new records.']);
						}else{
							return response()->json(['errorr'=>'Vui lòng kiểm tra lại tải khoản mật khẩu']);
						}
					}
				}
			}else{
				return response()->json(['errorr'=>'Vui lòng kiểm tra lại tải khoản mật khẩu']);
			}
            return response()->json(['error'=>$validator->errors()->all()]);
        
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
		if(Auth::user()){
			return redirect('/');
		}else{
			return view('Frontend.Pages.auth',compact('background'));
		}
        
	}
	
	public function comfirmEmailRes($id){
		$user = User::where('remember_token',$id)->first();
		$background = 2;
		if($user){
			$user->remember_token = '';
			$user->active_mail = 1;
			$user->save();
			return view('Frontend.Pages.comfirmEmailUser', ['user' => $user,'background' => $background ]);
		}else{
			return redirect('/');
		}
        
	}
	public function storeCaptchaForm(Request $request)
    {
		$validator = Validator::make($request->all(), 
		[
			'email' => 'required|unique:users,email', 
			'name' => 'required',
			'password' => 'required|alpha_dash', 
			'password_confirmed' => 'required', 
			'g_recaptcha_response' => 'required',
			], [
				'name.required' => 'Tên game không được để trống', 
				'g_recaptcha_response.required' => 'Bạn phải tích vào capcha', 
				'email.unique' => 'Email đã được sử dụng',
				'email.required' => 'Vui lòng nhập email',
				'password.alpha_dash' => 'Mật khẩu không được có khoảng cách',
				'password_confirmed.required' => 'Bạn chưa nhập mật khẩu',
				'password.confirmed' => 'Hai mật khẩu không trùng khớp nhau',
				'password.min' => 'Mật khẩu nhiều hơn 6 kí tự',
				'password.required' => 'Bạn chưa nhập mật khẩu'
			]
		);
		if ($validator->passes()) {
			$user = new User;
			$user->email = $request->email;
			$user->name = $request->name;
			$user->password = Hash::make($request->password);
			$user->active = 0;
			$user->role = 0;
			$user->active_mail = 0;
			$name = array(
				'name' => '111111111',
				'code' => str_random(64),
			);
			$user->remember_token = $name['code'];
			$user->save();
			// Mail::to('phamquycntta@gmail.com')->send(new SendMailable($user));
			return response()->json(['success'=>'Added new records.']);
        }


    	return response()->json(['error'=>$validator->errors()->all()]);
		
	}
	
	public function profile(){
		$background = 1;
		if(Auth::user()){
			return view('Frontend.Pages.profile',compact('background'));
		}else{
			return redirect('/');
		}
	}
	public function ForgotPassword(){
        $background = 1;
        return view('Frontend.Pages.mailFogetPass',compact('background'));
	}
	public function postEmailForgotPassword(Request $request){
		if($request->g_recaptcha_response == null){
			return response()->json(['capcha'=>'Added new records.']);
		}
        $user = User::where('email',$request->email)->first();
        if($user) {
            $newData = [
                'email' => $user->email,
                'token' => str_random(64),
			];
			$user->email = $request->email;
			$user->remember_token = $newData['token'];
			$user->save();
			
			// if($data && $user) {
			// 	$user->data = $data;
			// 	\MyLog::do()->add('info-pwd-reset');
			// 	\Mail::to($user->email)->send(new UserResetPassword($user));
				 
			// }

			$user->data = $newData;
			Mail::to('phamquycntta@gmail.com')->send(new ForgetMailable($user));
			// dd('sdaaaaa');
			// event('user.password', [$newData, $user]);
			
			return response()->json(['success'=>'Added new records.']);
		}
		
		return response()->json(['error'=>'Email không tồn tại.Xin vui lòng nhập lại!']);
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
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

	}

	public function changePasswordFoget(Request $request,$id){
		$user = User::where('remember_token',$id)->first();
		
		$validatedData = $request->validate([
            'new-password' => 'required|string|min:6|confirmed',
		],
			[
				'new-password.required' => 'Mật khẩu mới không được để trống',
				'new-password.string' => 'Mật khẩu phải là dạng chuỗi',
				'new-password.min' => 'Mật khẩu phải có nhiều hơn 6 kí tự',
				'new-password.confirmed' => 'Mật khẩu xác nhận không khớp',
			]
		);

        // if(strcmp($user->password, $request->get('new-password')) == 0){
        //     //Current password and new password are same
        //     return redirect()->back()->with("error","Mật khẩu mới không thể giống như mật khẩu hiện tại của bạn. Vui lòng chọn một mật khẩu khác.");
        // }

        //Change Password
		$user->password = bcrypt($request['new-password']);
		$user->remember_token = '';
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");

	}
	public function addcontact(Request $request){

		// Mail::send('email.verify', 2222222222, function($message) {
        //     $message->to('phamquycntta@gmail.com', 'anhquy')->subject('Verify your email address');
		// });
		// $user = array(
		// 	'name' => '111111111',
		// 	'code' => 11111111111,
		// );
		// $data = array(
		// 	'name' => '111111111',
		// 	'code' => 11111111111,
		// );
		// \Mail::send('emails.comfirm', $data, function($message) use ($user) {
		// 	$message->subject( 'Subject line Here' );
		// 	$message->to('phamquycntta@gmail.com');
		// });
		// return 'Email was sent';
		// $name = array(
		// 	'name' => '111111111',
		// 	'code' => 11111111111,
		// );
		// Mail::to('phamquycntta@gmail.com')->send(new SendMailable($name));
		
		// return 'Email was sent';
		$contact = new Contact;
		if(Auth::user()){
			$contact->name = Auth::user()->name;
			$contact->email = Auth::user()->email;
		}else{
			$contact->name = $request->name;
			$contact->email = $request->email;
		}
		$contact->message = $request->message;
		$contact->save();
		return response([
			'success' => 'success'
		]);
		
		// $user = User::where('email',$request->email)->first();
        // if($user) {
        //     $newData = [
        //         'email' => $user->email,
        //         'token' => str_random(64),
		// 	];
		// 	$user->email = $request->email;
		// 	$user->remember_token = $newData['token'];
		// 	$user->save();
			
		// 	// if($data && $user) {
		// 	// 	$user->data = $data;
		// 	// 	\MyLog::do()->add('info-pwd-reset');
		// 	// 	\Mail::to($user->email)->send(new UserResetPassword($user));
				 
		// 	// }
				
		// 	$user->data = $newData;
		// 	Mail::to('phamquycntta@gmail.com')->send(new ForgetMailable($user));
		// 	// dd('sdaaaaa');
		// 	// event('user.password', [$newData, $user]);
			
        //     return redirect()->back()->with('status', 'Email lấy lại mật khẩu đã được gửi đi, vui lòng kiểm tra Inbox/Spam/Bulk và làm theo hướng dẫn');
		// }
		
        // return back()->withInput()->withErrors(
        //     ['email' => 'Không tìm thấy thông tin']
        // );
	}


	public function reset($token)
	{	$background = 1;
		$user = User::where('remember_token',$token)->first();
		return view('Frontend.Pages.resetPass',compact('token','background','user'));
    }

	public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $user = User::whereEmail($request->email)->first();
        if($user) {
            $newData = [
                'email' => $user->email,
                'token' => str_random(64),
                'created_at' => time()
            ];
			$table = config('auth.passwords.users.table');
			dd(1);
            \DB::table($table)->whereEmail($user->email)->delete();
            \DB::table($table)->insert($newData);
            event('user.password', [$newData, $user]);

            return redirect()->back()->with('status', 'Email lấy lại mật khẩu đã được gửi đi, vui lòng kiểm tra Inbox/Spam/Bulk và làm theo hướng dẫn');
        }
        return back()->withInput()->withErrors(
            ['email' => 'Không tìm thấy thông tin']
        );
	}
	

	public function postChange_status_user(Request $request){
		$user = User::find($request->id);
		if($user->active == 0){
			$user->active = 1;
			$user->save();
		}elseif($user->active == 1){
			$user->active = 0;
			$user->save();
		}
		return response([
			'success' => 'success'
        ]);
	}

	public function userCheckF(Request $request){
		if(Auth::user()){
			$user = User::find(Auth::user()->id);
			$user->check_f12 = $user->check_f12 + 1;
			$user->save();
			return response([
				'success' => 'success'
			]);
		}
		return response([
			'error' => 'error'
        ]);
	}

	
}
