<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\post;
use App\Models\tag;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = post::where('status',1)->orderBy('created_at','DESC')->paginate(5);
         $tags = tag::all();
         $categories = category::all();
        //dd($posts);
        return view('home',compact('post' , 'tags', 'categories'));
    }
}
