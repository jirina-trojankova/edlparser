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
        $path = $request->file->store('public');
        return view ('store',["path"=>$path]);
        }else{
            return 'No file selected';
        }
    }

}
