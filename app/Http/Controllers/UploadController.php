<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // $path = $request->file->store('public');
        // return view ('store',["path"=>$path]);
        // return Storage::putFile('public', $request->file('file'));
        return $request->file->storeAs('public','jana.jpg');
        }else{

            return 'No file selected';
        }
    }

    public function show(){
        $url = Storage::url('jana.jpg');
        return  "<img src='".$url."' />";
        // return Storage::files('public');
    }

}
