<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('projects.index', ['projects' => Project::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create', ['skills' => Skill::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'created_at' => 'required'
        ]);

        $path = $request->file('image')->store('/projects', ['disk' => 'public']);

        $project = new Project([
            'title' => $request->get('title'),
            'image' => $path,
            'description' => $request->get('description'),
            'created_at' => $request->get('created_at'),
        ]);

        $project->save();

        $project->skills()->attach($request->get('skills'));

        return redirect('dashboard/projects');

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
    public function edit($id)
    {
        return view('projects.edit', ['project' => Project::findOrFail($id), 'skills' => Skill::all() ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'created_at' => 'required'
        ]);

        $project = Project::findOrFail($id);

        if ($request->file('image')) {
            $path = $request->file('image')->store('/projects', ['disk' => 'public']);
            $project->image = $path;
        }

        $project->title = $request->get('title');
        $project->description = $request->get('description');
        $project->created_at = $request->get('created_at');

        $project->save();

        $project->skills()->detach();
        $project->skills()->attach($request->get('skills'));


        return redirect('dashboard/projects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->skills()->detach();
        $project->delete();
        return redirect()->back();
    }
}
