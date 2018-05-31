<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    
    public function store(Request $request)
    {
    $path = $request->file('txt')->store('txts');
    return $path;
    }


    public function saveFile(Request $request)
    {
    Storage::put('txt');
    }


}
