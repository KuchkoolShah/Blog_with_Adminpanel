<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\like;
use App\Models\post;
class PostController extends Controller
{
    public function post(post $post)
    {
        return view('user.post',compact('post'));
    }

    public function getAllPosts()
    {
        return $posts = post::with('likes')->where('status',1)->orderBy('created_at','DESC')->paginate(5);
    }

    public function saveLike(request $request)
    {
        $likecheck = like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->first();
        if ($likecheck) {
            like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->delete();
            return 'deleted';
        }else{
            $like = new like;
            $like->user_id = Auth::id();
            $like->post_id = $request->id;
            $like->save();
        }
    }
}
