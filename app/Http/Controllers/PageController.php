<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    public function index() {
        $projectdata = Project::all();
        return view('index')->with('projectdata', $projectdata);
    }

    public function dashboard() {
        $projects = Project::all();
        return view('dashboard', compact('projects'));
    }
    
}
