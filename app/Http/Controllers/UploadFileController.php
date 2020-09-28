<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//otra forma de subir archivos al servidor

class UploadFileController extends Controller {
   public function index() {    
      Auth::user()->authorizeRoles(['user', 'administrador', 'operador']);  
      return view('uploadfile');
   }
   public function showUploadFile(Request $request) {
      Auth::user()->authorizeRoles(['user', 'administrador', 'operador']);

      $file = $request->file('image');
   
      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
   
      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      echo '<br>';
   
      //Display File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      echo '<br>';
   
      //Display File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';
   
      //Display File Mime Type
      echo 'File Mime Type: '.$file->getMimeType();
   
      //Move Uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
   }
}