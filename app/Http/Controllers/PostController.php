<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','view']);
    }

    public function index(){

        $posts = Post::latest();

        if($month = request('month')){

            $posts->whereMonth('created_at', Carbon::parse($month)->month);

        }

        if($year = request('year')){

            $posts->whereYear('created_at', $year);
            
        }

        if($category = request('category')){

            $posts->where('category', $category);
            
        }


        $posts = $posts->get();

        $archives = Post::archive();
        return view('post.index',compact('posts'));
    }

    public function view(Post $post){
        $archives = Post::selectRaw('year(created_at) year,monthname(created_at) month,COUNT(*) published')->groupBy('year','month')->get()->toArray();
        return view('post.view',compact('post','archives'));
    }
    
    public function create(){
        
        $archives = Post::selectRaw('year(created_at) year,monthname(created_at) month,COUNT(*) published')->groupBy('year','month')->get()->toArray();
        return view('post.create',compact('archives'));
    }

    public function store(){

        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required|min:10',
            'category' => 'required'
        ]);
        
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
            'category' => request('category')
        ]);

        //redirect it into

        return redirect('/');





        //create new post using form data
        //$post = new Post;

        // $post->title = request('title');
        // $post->body = request('body');
        // //save it into db

        // $post->save();
    }
}
