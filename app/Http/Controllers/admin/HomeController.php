<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;
use App\Post;

class HomeController extends Controller
{

    public function index() {

        $last_5_posts = Post::latest()->limit(5)->get();

        $last_5_support = Support::latest()->limit(5)->get();

        return view('admin.index', compact(['last_5_posts', 'last_5_support']));

    }

}
