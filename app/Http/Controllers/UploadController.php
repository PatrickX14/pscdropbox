<?php

namespace App\Http\Controllers;

use App\Models\Upload;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upload = Upload::all();
        return view('showupload')->with('uploads', $upload);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'firstname'=>['required'],
            'lastname'=>['required'],
            // 'portrait'=>'required'
        ],[
            'firstname.required'=>'Full out name',
            'lastname.required'=>'Full out lastname'
        ]);

        $upload = Upload::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname
        ]);
        if(!$validate) {
            return;
        }else {
            $upload;
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $upload = Upload::find($id);
        return view('showupload')->with('upload', $upload);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UploadController $UploadController)
    {
        //
    }
}
