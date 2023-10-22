<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectData = Project::all();
        return view('projectshow')->with('projectdata', $projectData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projectupload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'projectname' => 'required',
            'academicyear' => 'required',
            'gradelevel' => 'required',
            'class' => 'required',
            'description' => 'required',
            'projectmembers' => 'required',
            'projectadvisors' => 'required',
            'abstract' => 'required',
            'code' => 'required',
            'approval' => 'required',
            'video' => 'required'
        ], [
            'projectname.required' => 'โปรดระบุชื่อโครงงาน',
            'academicyear.required' => 'โปรดระบุปีการศึกษา',
            'gradelevel.required' => 'โปรดระบุชั้นปี',
            'class.required' => 'โปรดระบุห้อง',
            'description.required' => 'โปรดระบุคำอธิบาย',
            'projectmembers.required' => 'โปรดระบุผู้รับชอบโครงงาน',
            'projectadvisors.required' => 'โปรดระบุอาจารย์ที่ปรึกษา',
            'abstract.required' => 'โปรดเพิ่มรูปเล่มโครงงาน',
            'code.required' => 'โปรดเพิ่มโค้ด',
            'approval.required' => 'โปรดเพิ่มใบลายเซ็น',
            'video.required' => 'โปรดเพิ่มวิดีโอ'
        ]);

        if (!$validated) {
            return;
        } else {
            $project = new Project;
            $project->projectname = $request->projectname;
            $project->academicyear = $request->academicyear;
            $project->gradelevel = $request->gradelevel;
            $project->class = $request->class;
            $project->description = $request->description;
            $project->projectmembers = $request->projectmembers;
            $project->projectadvisors = $request->projectadvisors;
            $project->abstract = $request->abstract->getClientOriginalName();
            $project->code = $request->code->getClientOriginalName();
            $project->approval = $request->approval->getClientOriginalName();
            $project->video = $request->video;
            $project->save();
            $request->file('abstract')->storeAs('abstract', $request->file('abstract')->getClientOriginalName(), 'public');
            $request->file('code')->storeAs('code', $request->file('code')->getClientOriginalName(), 'public');
            $request->file('approval')->storeAs('approval', $request->file('approval')->getClientOriginalName(), 'public');
        }
        return redirect(route('project.show'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  string $id)
    {
        $project = Project::find($id);
        $project->projectname = $request->projectname;
        $project->academicyear = $request->academicyear;
        $project->gradelevel = $request->gradelevel;
        $project->class = $request->class;
        $project->description = $request->description;
        $project->projectmembers = $request->projectmembers;
        $project->projectadvisors = $request->projectadvisors;
        $project->abstract = $request->abstract->getClientOriginalName();
        $project->code = $request->code->getClientOriginalName();
        $project->approval = $request->approval->getClientOriginalName();
        $project->video = $request->video;
        $project->save();
        $request->file('abstract')->storeAs('abstract', $request->file('abstract')->getClientOriginalName(), 'public');
        $request->file('code')->storeAs('code', $request->file('code')->getClientOriginalName(), 'public');
        $request->file('approval')->storeAs('approval', $request->file('approval')->getClientOriginalName(), 'public');
        return redirect(route('project.show'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, string $id)
    {
        $project = Project::find($id);
        $project->delete;
    }
}
