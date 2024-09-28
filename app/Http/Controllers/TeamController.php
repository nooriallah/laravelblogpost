<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view("admin.team.show", compact("teams"))->with("title", "All team member");
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.team.add")->with("title", "Add new team member");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required|min:30",
            "position" => "required",
            "image" => "nullable|image",
        ]);

        $team = new Team();

        $team->name = $request->name;
        $team->description = $request->description;
        $team->postion = $request->position;


        $imagename = "no-image.jpg";
        if ($request->hasFile("image")) {
            $image = $request->image;
            $imagename = $request->name . '.' . $image->getClientOriginalExtension();
            $request->image->move('admin/team/', $imagename);
        }
        $team->image = $imagename;

        $team->save();

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
        $team = Team::find($id);
     return view("admin.team.edit", compact("team"))->with("title", "Edit team member");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            "name" => "required",
            "description" => "required|min:30",
            "position" => "required",
            "image" => "nullable|image",
        ]);

        $team = Team::find($id);

        $team->name = $request->name;
        $team->description = $request->description;
        $team->postion = $request->position;

        if ($request->hasFile("image")) {
            if ($team->image) {
                File::delete(public_path('/admin/team/' . $team->image));
            }
            $image = $request->image;
            $imagename = $request->name . "." . $image->getClientOriginalExtension();
            $request->image->move('admin/team/', $imagename);
            $team->image = $imagename;
        }

        $team->update();



        return redirect()->back()->with('message', 'Successfuly updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::find($id);
        File::delete(public_path('admin/team/' . $team->image));
        $team->delete();
        
        return redirect()->back()->with('message', 'Successfuly deleted');
    }
}
