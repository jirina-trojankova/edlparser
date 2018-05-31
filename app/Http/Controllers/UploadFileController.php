<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadFileController extends Controller {
   public function index(){
      return view('welcome');
   }
   public function showUploadFile(Request $request){
      $file = $request->file('txt');
   
      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
   
      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      echo '<br>';
   
//       //Move Uploaded File
//       $destinationPath = 'uploads';
//       $file->move($destinationPath,$file->getClientOriginalName());
     }
}
