<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
Use App\Jobs\SendPostEmail;
class PostController extends Controller
{
        public function index()
        {
            return view('index');
        }    
        
        public function store()
        {

            $post = [];
            
            $this->dispatch(new SendPostEmail($post));
            return redirect()->back()->with('status', 'Your post has been submitted successfully');
        }
}