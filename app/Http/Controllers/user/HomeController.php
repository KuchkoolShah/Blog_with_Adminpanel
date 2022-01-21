<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\post;
use App\Models\tag;
class HomeController extends Controller
{
    public function index()
    {
        $posts = post::where('status',1)->orderBy('created_at','DESC')->paginate(5);
        //dd($posts);
        return view('user.blog',compact('posts'));
    }
    public function tag(tag $tag)
    {
        $posts = $tag->posts();
        return view('user.blog',compact('posts'));
    }

    public function category(category $category)
    {
        $posts = $category->posts();
        return view('user.blog',compact('posts'));
    }
    
     public function showpost()
    {
        $post = post::where('status',1)->orderBy('created_at','DESC')->paginate(5);
        //dd($posts);
        return view('home',compact('post'));
    }
}
