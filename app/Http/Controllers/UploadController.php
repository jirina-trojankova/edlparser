<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller
{
    public function index ()
    {
        return view ('welcome');
    }

    public function store (){

        If(Input::hasFile('file')){
            

            $file = Input::file('file');

            $destinationPath = public_path(). '/uploads/';
            $filename = $file->getClientOriginalName();

            $file->move($destinationPath, $filename);

            //echo  $filename;
            echo '<img src="uploads/'. $filename . '"/>';
        }
    }

    // public function store(request $request)
    // {
    //     if ($request->hasFile('file')){
    //     $request->file('file');
    //     // $path = $request->file->store('public');
    //     // return view ('store',["path"=>$path]);
    //     // Storage::disk('public')->put($request->getClientOriginalName() . $request->getClientOriginalExtension() ,$request->file);
    //     // return Storage::putFile('public', $request->file('file'));
    //     $request->file->store('public');
    //     $path = $request->file->getClientOriginalName();
    //     // $request->file->path();
    //     return "<img src='/storage/".$path."' />";
    //     // <img src="{{ 'storage/' . $path }}">
    //     }else{

    //         return 'No file selected';
    //     }
    // }

    // public function show(){
    //     $url = Storage::url('jana.jpg');
    //     return  "<img src='".$url."' />";
    //     // return Storage::files('public');
    // }

}
