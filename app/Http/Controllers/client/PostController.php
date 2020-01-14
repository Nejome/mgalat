<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\PostComment;
use App\PostView;

class PostController extends Controller
{

    public function index() {

        $current = 'blog';

        $posts = Post::paginate(6);

        return view('client.blog.index', compact(['current', 'posts']));

    }

    public function show(Request $request, Post $post) {

        $current = 'blog';

        $exist = PostView::where(['ip' => $request->ip(), 'post_id' => $post->id])->first();

        if(!$exist){

            $new = new PostView;
            $new->post_id = $post->id;
            $new->ip = $request->ip();
            $new->Save();

            $post->views += 1;
            $post->save();

        }

        $posts = Post::where('id', '!=', $post->id)->limit(3)->get();

        return view('client.blog.post', compact(['current', 'post', 'posts']));

    }

    public function comment(Request $request, Post $post) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        $comment = new PostComment;
        $comment->post_id = $post->id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->save();

        return back()->with('created', 'تمت اضافة تعليقك بنجاح');

    }

}
