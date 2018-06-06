<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{

  public function show(request $request) {
      if ($request->hasFile('file')){
          $request->file('file');
          return  $request->file->show('public');
        //   view('new',['uploaded'=>$uploaded]);
          }else{
              return 'No file selected';
          } 
  }

  public function store(request $request)
    {
        if ($request->hasFile('file')){
        $img = $request->file('file');
        $request->file->store('public');
        }else{
            return 'No file selected';
        }
    }
}
