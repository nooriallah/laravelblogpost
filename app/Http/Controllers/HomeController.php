<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        $usertype = Auth::user()->usertype;

        if($usertype == "admin") {
            return view("admin.dashboard")->with("title","Dashboard");
        }
        else if($usertype == "user") {
            return view("frontend.home.homepage")->with('posts', Post::all());
        }
        else {
           abort(404);
        }
    }

    public function homepage() {
        $posts = Post::orderBy("created_at", "desc")->where('status', 'active')->get();
        return view("frontend.home.homepage", compact('posts'));
    }

    public function show(string $id) {
        $post = Post::find($id);

        return view("frontend.single.singlepost", compact('post'));
    }
}
