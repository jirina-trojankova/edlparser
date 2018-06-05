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
        if ($request->hasFile('image')){
        $request->file('image');
        return $request->image->store('public');
        }else{
            return 'No file selected';
        }
    }
}
