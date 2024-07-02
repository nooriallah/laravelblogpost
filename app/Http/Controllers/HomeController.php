<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Post;
use App\Models\Setting;
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
            return view("frontend.homepage")->with('posts', Post::all());
        }
        else {
           abort(404);
        }
    }

    public function homepage() {
        $posts = Post::orderBy("created_at", "desc")->where('status', 'active')->get();
        $about = About::first();
        $setting = Setting::first();

        return view("frontend.homepage", compact('posts', 'about', "setting"));
    }

    public function show(string $id) {
        $post = Post::find($id);

        return view("frontend.single.singlepost", compact('post'));
    }

    public function about() {
        $about = About::find(1);
        return view("frontend.about", compact('about'));
    }

    public function services() {
        $posts = Post::orderBy("created_at", "desc")->where('status', 'active')->get();
        return view("frontend.services", compact('posts'));
    }

    public function blogs() {
        $posts = Post::orderBy("created_at", "desc")->where('status', 'active')->get();
        return view("frontend.blogs", compact('posts'));
    }

    public function contact() {
        return view("frontend.contact");
    }
}
