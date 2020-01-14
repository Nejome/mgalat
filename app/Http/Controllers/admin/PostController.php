<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\PostComment;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index() {

        $posts = Post::paginate(5);

        return view('admin.posts.index', compact(['posts']));

    }

    public function create() {

        return view('admin.posts.create');

    }

    public function store(Request $request) {

        $this->validate($request, [
            'author' => 'required',
            'title_ar' => 'required',
            'title_en' => 'required',
            'details_ar' => 'required',
            'details_en' => 'required',
            'image' => 'required|image',
        ]);

        $image_name = time().'.'.request()->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/posts/'), $image_name);

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->author = $request->author;
        $post->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $post->setTranslations('details', ['ar' => $request->details_ar, 'en' => $request->details_en]);
        $post->image = $image_name;
        $post->save();

        return redirect(url('admin/posts'))->with('added', 'تمت اضافة المقال الجديد بنجاح');

    }

    public function comments(Post $post) {

        return view('admin.posts.post_comments', compact(['post']));

    }

    public function edit(Post $post) {

        return view('admin.posts.edit', compact(['post']));

    }

    public function update(Request $request, Post $post) {

        $this->validate($request, [
            'author' => 'required',
            'title_ar' => 'required',
            'title_en' => 'required',
            'details_ar' => 'required',
            'details_en' => 'required',
            'image' => 'image',
        ]);

        if(isset($request->image) && $request->image != ''){
            $new_image = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/posts/'), $new_image);
            if(file_exists(public_path('uploads/posts/'.$post->image))){
                unlink(public_path('uploads/posts/'.$post->image));
            }
            $post->image = $new_image;
        }

        $post->author = $request->author;
        $post->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $post->setTranslations('details', ['ar' => $request->details_ar, 'en' => $request->details_en]);
        $post->save();

        return redirect(url('admin/posts'))->with('updated', 'تم تعديل بيانات المقال بنجاح');

    }

    public function deleteComment(PostComment $comment) {

        $comment->delete();

        return back()->with('deleted', 'تم حذف التعليق بنجاح');

    }

    public function delete(Post $post) {


        if(file_exists(public_path('uploads/posts/'.$post->image))){
            unlink(public_path('uploads/posts/'.$post->image));
        }

        $post->delete();

        return back()->with('deleted', 'تم حذف المقال بنجاح');

    }

}
