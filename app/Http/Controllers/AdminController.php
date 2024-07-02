<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.dashboard")->with("title", "Dashboard")->with("posts", Post::all());
    }

    /**
     * Show the about for creating a new about.
     */
    public function about()
    {
        $about = About::find(1);
        return view("admin.about.about", compact('about'))->with('title', "About text");
    }

    /**
     * Show the about for updating about.
     */
    public function updateAbout(Request $request, string $id)
    {
        $request->validate([
            "text" => "required|min:50",
            "image" => "required|image",
        ]);

        $about = About::find($id);

        $about->text = $request->text;


        if ($request->hasFile("image")) {
            if ($about->image) {
                File::delete(public_path('/admin/aboutimage/' . $about->image));
            }
            $image = $request->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('admin/aboutimage/', $imagename);
            $about->image = $imagename;
        }

        $about->update();

        return redirect()->back()->with('message', 'Successfuly updated');
    }

    /**
     * Setting show.
     */
    public function setting()
    {
        $title = "Settings";
        $setting = Setting::first();

        return view("admin.setting.setting", compact('title', 'setting'));
    }

    /**
     * Setting show.
     */
    public function updateSetting(Request $request)
    {
        $request->validate([]);

        $setting = Setting::first();

        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        $setting->youtube = $request->youtube;
        $setting->twitter = $request->twitter;
        $setting->linkedin = $request->linkedin;
        $setting->telegram = $request->telegram;

        if ($request->hasFile("icon")) {
            if ($setting->icon) {
                File::delete(public_path('admin/settingimages/' . $setting->icon));
            }
            $icon = $request->icon;
            $imagename = time() . '.' . $icon->getClientOriginalExtension();
            $request->icon->move('admin/settingimages/', $imagename);
            $setting->icon = $imagename;
        }
        
        if ($request->hasFile("logo")) {
            if ($setting->logo) {
                File::delete(public_path('admin/settingimages/' . $setting->logo));
            }
            $logo = $request->logo;
            $imagename = time() . '_.' . $logo->getClientOriginalExtension();
            $request->logo->move('admin/settingimages/', $imagename);
            $setting->logo = $imagename;
        }
        
        $setting->update();

        return redirect()->back()->with('message', 'Successfuly updated');
    }

    /**
     * Display the charts.
     */
    public function charts()
    {
        $title = "Statistics";
        return view("admin.charts.charts", compact("title"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
