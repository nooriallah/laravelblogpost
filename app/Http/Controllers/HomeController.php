<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Testimonial;
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
        $testimonials = Testimonial::all();

        return view("frontend.homepage", compact('posts', 'about', "setting","testimonials"));
    }

    public function show(string $id) {
        $post = Post::find($id);
        $setting = Setting::first();

        return view("frontend.single.singlepost", compact('post', "setting"));
    }

    public function about() {
        $about = About::find(1);
        $setting = Setting::first();
        return view("frontend.about", compact('about', "setting"));
    }

    public function services() {
        $posts = Post::orderBy("created_at", "desc")->where('status', 'active')->get();
        $setting = Setting::first();
        return view("frontend.services", compact('posts', "setting"));
    }

    public function blogs() {
        $posts = Post::orderBy("created_at", "desc")->where('status', 'active')->get();
        $setting = Setting::first();
        return view("frontend.blogs", compact('posts', "setting"));
    }

    public function contact() {
        $setting = Setting::first();
        return view("frontend.contact", compact("setting"));
    }
}
