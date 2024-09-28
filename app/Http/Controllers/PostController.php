<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.post.show")->with("title", "All posts")->with("posts", Post::orderBy("created_at", "desc")->paginate(6));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.post.add")->with("title", "Add new post");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required|min:3",
            "image" => "nullable|image",
        ]);

        $user = Auth::user();
        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;

        $post->status = $request->status;
        $post->name = $user->name;

        $post->user_id = $user->id;
        $post->usertype = $user->usertype;
        $post->slug = Str::slug($request->title);

        $imagename = "no-image.jpg";
        if ($request->has("image")) {
            $image = $request->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimages/', $imagename);
        }
        $post->image = $imagename;

        $post->save();

        return redirect()->back()->with('message', 'Successfuly added');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view("admin.post.edit")->with('title', 'Edit post')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "required",
            "description" => "required|min:3",
            "image" => "nullable|image",
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title);


        if ($request->hasFile("image")) {
            if ($post->image) {
                File::delete(public_path('/postimages/' . $post->image));
            }
            $image = $request->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimages/', $imagename);
            $post->image = $imagename;
        }


        $post->update();

        return redirect()->back()->with('message', 'Successfuly updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        File::delete(public_path('postimages/' . $post->image));
        $post->delete();

        return redirect()->back()->with('message', 'Successfuly deleted');
    }

    /**
     * Trashed the specified resource from storage.
     */
    public function trashed()
    {
        return view("admin.post.trashed")->with("title", "Trashed posts")->with("posts", Post::orderBy("created_at", "desc")->onlyTrashed()->paginate(6));
    }

    /**
     * Restore the specified resource from trashed.
     */
    public function restore(string $id)
    {
        $post = Post::withTrashed()->find($id);
        $post->restore();

        return redirect()->back()->with("message", "Post resotred");
    }

    /**
     * Remove the specified resource from trashed.
     */
    public function remove(string $id)
    {
        $post = Post::withTrashed()->find($id);

        if ($post->image) {
            File::delete(public_path('/postimages/' . $post->image));
        }

        $post->forceDelete();

        return redirect()->back()->with("message", "Post perminantly deleted!");
    }
}
