<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $projectdata = Project::all();
        return view('index')->with('projectdata', $projectdata);
    }
}
