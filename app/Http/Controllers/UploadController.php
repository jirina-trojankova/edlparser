<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index ()
    {
        return view ('welcome');
    }

    public function store(request $request)
    {
        if ($request->hasFile('file')){
        $request->file('file');
        return $request->file->store('public');
        }else{
            return 'No file selected';
        }
    }
}
