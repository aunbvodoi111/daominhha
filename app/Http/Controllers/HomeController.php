<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GamesModel;
use App\TheLoaiModel;
use App\TagModel;
use App\User;
use App\Link_list;
use App\Linkhide;
use DB;
use App\totalGame;
use View;
class HomeController extends Controller
{
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
    

    public function getHome(){
        $games = GamesModel::select('id', 'Name', 'AnhChinh', 'Avatar', 'TenKhongDau', 'TheLoai', 'SoLuotXem', 'MoTa', 'AnhMini', 'created_at')->orderBy('CurrentTime', 'desc')->where('id','!=',997)->where('id','!=',8)->where('id','!=',40)->where('id','!=',80)->take(20)->get();
        $gamehot = GamesModel::select('id', 'Name', 'Avatar', 'TenKhongDau', 'MoTa', 'AnhMini', 'created_at')->where('id',601)->orwhere('id',2151)->orwhere('id',2172)->orwhere('id',2239)->orwhere('id',13)->orderBy('id','desc')->get();
        $gametop = GamesModel::select('id', 'Name', 'AnhChinh', 'Avatar', 'TenKhongDau', 'TheLoai', 'SoLuotXem', 'MoTa', 'AnhMini', 'created_at')->where('id',1784)->orwhere('id',40)->orwhere('id',8)->orwhere('id',997)->orderBy('id','desc')->get();
    // 	$games = GamesModel::orderBy('CurrentTime', 'desc')->where('id','!=',997)->where('id','!=',1523)->where('id','!=',40)->where('id','!=',1276)->take(16)->get();
        // $gamehot = GamesModel::where('id',601)->orwhere('id',1276)->orwhere('id',1523)->orwhere('id',541)->orwhere('id',13)->orderBy('id','desc')->get();
        // $gametop = GamesModel::where('id',1276)->orwhere('id',40)->orwhere('id',1523)->orwhere('id',997)->orderBy('id','desc')->get();
        $gameactive = DB::table('games')->where('id', 2417)->first();
    	$background = 1;
        return view('Frontend.Pages.home', ['games' => $games, 'gamehot' => $gamehot, 'gametop' => $gametop, 'gameactive' => $gameactive, 'background' => $background]);
    }
    
    public function getGamesDetail($TenKhongDau, $id){
    	$games = GamesModel::find($id);
    	$background = 2;
    	$games->SoLuotXem = $games->SoLuotXem + 1;
    	$games->save();
        $gamescungseries = GamesModel::select('id', 'Name', 'AnhChinh', 'Avatar', 'TenKhongDau', 'AnhMini', 'created_at')->where('Series', $games->Series)->where('id', '!=', $games->id)->take(7)->get();
        $gamesxemnhieu = GamesModel::select('id', 'Name', 'AnhChinh', 'Avatar', 'TenKhongDau', 'AnhMini', 'created_at')->orderBy('SoLuotXem', 'desc')->take(10)->get();
        $gamesrandom = GamesModel::select('id', 'Name', 'AnhChinh', 'Avatar', 'TenKhongDau', 'AnhMini', 'created_at')->inRandomOrder()->take(10)->get();
        $seotitle = GamesModel::find($id);
        $link_loaded = [];
        $id_loaded = 0;
        if(\Auth::user()){
            $link_loaded = User::find(\Auth::user()->id);
            foreach($link_loaded->link_loaded as $name){
                if($name->id_product == $games->id){
                    $id_loaded = $name->id;
                }
            }
        }

        $totalGame = totalGame::find(1);
    	return view('Frontend.Pages.games-detail', ['totalGame'=>$totalGame,'games' => $games, 'background' => $background, 'gamescungseries' => $gamescungseries, 'gamesrandom' => $gamesrandom, 'seotitle' => $seotitle, 'gamesxemnhieu' => $gamesxemnhieu, 'link_loaded' => $link_loaded, 'id_loaded' => $id_loaded]);
    }

    public function getGamesTheLoai($TenKhongDau, $idTheLoai){
    	$theloaigame = TheLoaiModel::find($idTheLoai);
        $gamestheloai = TagModel::where('id_TheLoai', $idTheLoai)->paginate(16);
        $curentpage = $gamestheloai->currentPage();
    	$background = 5;
        $seotitletheloai = TheLoaiModel::find($idTheLoai);
    	return view('Frontend.Pages.games-theloai', ['theloaigame' => $theloaigame, 'background' => $background, 'gamestheloai' => $gamestheloai, 'seotitletheloai' => $seotitletheloai, 'curentpage' => $curentpage]);
    }

    public function getAllGames(){
    	$games = GamesModel::select('id', 'Name', 'AnhChinh', 'Avatar', 'TenKhongDau', 'TheLoai', 'SoLuotXem', 'MoTa', 'AnhMini', 'created_at')->orderBy('created_at', 'desc')->paginate(16);
    	$curentpage = $games->currentPage();
    	$background = 2;
    	$seotitleallgames = "";
        return view('Frontend.Pages.all-games', ['games' => $games, 'background' => $background, 'seotitleallgames' => $seotitleallgames, 'curentpage' => $curentpage]);
    }
    
    public function getGamesXemNhieu(){
        $games = GamesModel::select('id', 'Name', 'AnhChinh', 'Avatar', 'TenKhongDau', 'TheLoai', 'SoLuotXem', 'MoTa', 'AnhMini', 'created_at')->orderBy('SoLuotXem', 'desc')->paginate(16);
        $curentpage = $games->currentPage();
        $background = 3;
        $seotitlegamexemnhieu = "";
        return view('Frontend.Pages.game-xemnhieu', ['games' => $games, 'background' => $background, 'curentpage' => $curentpage, 'seotitlegamexemnhieu' => $seotitlegamexemnhieu]);
    }
    
    public function getGamesVietHoa(){
        $games = GamesModel::select('id', 'Name', 'AnhChinh', 'Avatar', 'TenKhongDau', 'TheLoai', 'SoLuotXem', 'MoTa', 'AnhMini', 'created_at')->where('Name', 'like', '%việt hóa%')->paginate(16);
        $curentpage = $games->currentPage();
        $background = 4;
        $seotitlegameviethoa = "";
        return view('Frontend.Pages.viethoa', ['games' => $games, 'background' => $background, 'curentpage' => $curentpage, 'seotitlegameviethoa' => $seotitlegameviethoa]);
    }

    public function getSearch(Request $request){
        $search = $request->Search;
        $background = 3;
        if($search == ""){
            $gamesSearch = GamesModel::orderBy('created_at', 'desc')->paginate(12);
            return view('Frontend.Pages.search', ['gamesSearch' => $gamesSearch, 'background' => $background, 'search' => $search]);
        }
        else{
            $gamesSearch = GamesModel::where('Name', 'like', "%$search%")->paginate(12);
            $gamesSearch->appends(['Search' => $search]);
            return view('Frontend.Pages.search', ['gamesSearch' => $gamesSearch, 'background' => $background, 'search' => $search]);
        }       
    }

    public function getLiveSearch(Request $request){
        if($request->ajax()){
            $query = $request->get('tukhoa');
            if(strlen($query) >= 2){
                $data = GamesModel::where('Name', 'like', "%$query%")->take(20)->get();
                if(count($data) > 0){
                    return view('Frontend.Pages.searchajax', ['data' => $data]);
                }               
            }     
        }
    }

    public function link($id){
        $background = 1;
        $totalGame = totalGame::find(1);
        $data = Link_list::where('code',$id)->first();
        // dd();
        if($data->title_link->type_link && $data->title_link->type == 1){
            if(\Auth::user()){
                $link_loaded = Linkhide::where('id_user',\Auth::user()->id)->get();
                // dd($link_loaded,$data->title_link->id_product);
                $id = 0;
                foreach($link_loaded as $item){
                    if($item->id_product == $data->title_link->id_product){
                        $id = 1;
                    }
                }
                if($id == 1){
                    return view('Frontend.Pages.linkgoogle',compact('background','data','totalGame'));
                }else{
                    return view('Frontend.Pages.checkAuthDownload',compact('background'));
                } 
            }else{
                return redirect('/login');
            }
        }else{
            return view('Frontend.Pages.linkgoogle',compact('background','data','totalGame'));
        }
        
    }
    
    public function checkPassLink(Request $request){
        $background = 1;
        $data = Link_list::find($request['name']);
        $validator = \Validator::make($request->all(), [
            'code' => 'required',
        ]);
        $totalGame = totalGame::find(1);
        if($totalGame->password == $request['code']){
            return response()->json(['susscess'=>$data]); 
        }else if($totalGame->password != $request['code']){
            return response()->json(['errCode'=>'errCode']); 
        }else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    	
    }

    public function savelinkgame(Request $request){
        $linklist = new Linkhide;
        $linklist->id_product = $request->id;
        $linklist->id_user = \Auth::user()->id;
        $linklist->save();
        return response()->json(['success'=>'success']); 
    }
    
    
    public function download($id){
        $background = 1;
        return view('Frontend.Pages.download',['id' => $id]);
    }

    public function donate(){
        $background = 1;
        return view('Frontend.Pages.donate',compact('background'));
    }
    
}
