<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\File;

class ApiController extends Controller {
    
    public function index(){
        $files = File::all();
        return response()->json($files);
    }

    public function show($id){
        $file = File::findOrFail($id);
        return response()->json($file);
    }

    public function download($id){
        $file = File::where('id', '=', $id)->first();
        $extension = \File::extension($file->file_path);
        $myFile = base_path('/public/src/files/'.$file->file_path);
        $headers = ['Content-Type: application/pdf'];
        $newName = $file->title.'.'.$extension;

        return response()->download($myFile, $newName, $headers);
    }
}