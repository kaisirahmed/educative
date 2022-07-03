<?php

namespace App\Http\Controllers\Ckeditor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $fileNameWithExtension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenameToStore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenameToStore); 
            $msg = 'Image successfully uploaded'; 
            $return = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $return;
        }
    }
}
