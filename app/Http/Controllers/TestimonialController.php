<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Testimonials";
        $testimonials = Testimonial::all();

        return view("admin.testimonials.testimonial", compact('title', 'testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.testimonials.create")->with("title", "Create testimonial");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "quotation" => "required|min:30",
            "image" => "required|image"
        ]);

        $testi = new Testimonial();

        $testi->name = $request->name;
        $testi->quotation = $request->quotation;

        if ($request->hasFile("image")) {
            $image = $request->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('admin/testi/', $imagename);
            $testi->image = $imagename;
        }

        $testi->save();

        return redirect()->back()->with('message', 'Successfuly updated');
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
        $testi = Testimonial::find($id);
        return view("admin.testimonials.edit")->with('title', 'Edit testimonial')->with('testi', $testi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            "quotation" => "required|min:3",
            "image" => "nullable|image",
        ]);

        $testi = Testimonial::find($id);

        $testi->name = $request->name;
        $testi->quotation = $request->quotation;


        if ($request->hasFile("image")) {
            if ($testi->image) {
                File::delete(public_path('/admin/testi/' . $testi->image));
            }
            $image = $request->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('admin/testi/', $imagename);
            $testi->image = $imagename;
        }


        $testi->update();

        return redirect()->back()->with('message', 'Successfuly updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testi = Testimonial::find($id);
        $testi->delete();

        return redirect()->back()->with('message', 'Successfuly deleted');
    }
}
