<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\error;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectdata = Project::all();
        return view('project', compact('projectdata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projectcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
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

        if (!$validator) {
            return back()->withErrors([
                "projectname" => "please input project name"
            ])->withInput(["projectname", "academicyear"]);
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
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('projectshow', compact('project'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        // $food = Food::where(function ($query) use ($search) {
        //     $query->where('foodname', 'like', "%$search%")
        //         ->orWhereHas('diseases->name', 'like', "%$search%");
        // })->get();
        $project = Project::where(function ($query) use ($search) {
            $query->where('foodname', 'like', "%$search%")
                ->orWhere('foodkcal', 'like', "%$search%");
        })
            ->orWhereHas('diseases', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })->get();
        return view('search', compact('project'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('projectedit', compact("project"));
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
        $project->video = $request->video;
        $project->save();
        if ($request->hasFile('abstract')) {
            $project->abstract = $request->abstract->getClientOriginalName();
            $request->file('abstract')->storeAs('abstract', $request->file('abstract')->getClientOriginalName(), 'public');
            Storage::disk('public')->delete('abstract/' . $request->abstract);
        }
        if ($request->hasFile('code')) {
            $project->code = $request->code->getClientOriginalName();
            $request->file('code')->storeAs('code', $request->file('code')->getClientOriginalName(), 'public');
            Storage::disk('public')->delete('abstract/' . $request->abstract);
        }
        if ($request->hasFile('approval')) {
            $project->approval = $request->approval->getClientOriginalName();
            $request->file('approval')->storeAs('approval', $request->file('approval')->getClientOriginalName(), 'public');
            Storage::disk('public')->delete('abstract/' . $request->abstract);
        }
        return redirect()->route("dashboard");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, string $id)
    {
        $project = Project::find($id);
        $project->destroy($id);
        return redirect('/project');
    }
}
