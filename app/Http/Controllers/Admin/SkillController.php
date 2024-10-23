<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('skills.index', ['skills' => Skill::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'created_at' => 'required'
        ]);


        $skill = new Skill([
            'title' => $request->get('title'),
            'created_at' => $request->get('created_at'),
        ]);

        $skill->save();

        return redirect('dashboard/skills');

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
        return view('skills.edit', ['skill' => Skill::findOrFail($id) ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'created_at' => 'required'
        ]);


        $skill = Skill::findOrFail($id);

        $skill->title = $request->get('title');
        $skill->created_at = $request->get('created_at');

        $skill->save();

        return redirect('dashboard/skills');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->projects()->detach();
        $skill->delete();

        return redirect()->back();
    }
}
