<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Course;
use App\File;
use Auth;

class FileController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id){
        $course = Course::find($id);
        $files = File::where('course_id', $id)
            ->orderBy('id', 'desc')->paginate(10);
        return view('files.index')
            ->withFiles($files)->withCourse($course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){
        $course = Course::find($id);
        return view('files.create')->withCourse($course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|max:255',
            'file' => 'required|mimes:jpeg,jpg,png,pdf'
        ]);

        $request->merge([
            'user_id' => Auth::user()->id,
            'course_id' => $id
        ]);

        $file = File::create($request->all());
    
        $requestFile = $request->file('file');
        $filename = $file->id . '.' . $requestFile->getClientOriginalExtension();
        $requestFile->move(base_path().'/public/src/files/', $filename);
        $file->file_path = $filename;

        if(strcmp($requestFile->getClientOriginalExtension(), 'pdf') == 0 ||
            strcmp($requestFile->getClientOriginalExtension(), 'PDF') == 0) {
            $file->type = 0;    //pdf file
        } else {
            $file->type = 1;    //image file
        }
        $file->save();
        
        notify()->flash('<h3>The file has been saved successfully!</h3>', 'success', ['timer' => 2000]);
        return redirect()->route('file.show', $file->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $file = File::where('id', '=', $id)->first();
        return view('files.show')->withFile($file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $file = File::find($id);
        if($file->user_id != Auth::user()->id)
            return false;
        return view('files.edit')->withFile($file);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $this->validate($request, [
            'title' => 'required|max:255',
            'file' => 'mimes:jpeg,jpg,png,pdf'
        ]);

        $file = File::find($id);
        
        if($file->user_id != Auth::user()->id)
            return false;

        $file->title = $request->input('title');
        if($request->hasFile('file')){
            //delete the file from the storage
            $oldFileName = $file->file_path;
            $oldFilePath = base_path('/public/src/files/'.$oldFileName);
            \File::delete($oldFilePath);

            $requestFile = $request->file('file');
            $filename = $file->id . '.' . $requestFile->getClientOriginalExtension();
            $requestFile->move(base_path().'/public/src/files/', $filename);
            $file->file_path = $filename;

            if(strcmp($requestFile->getClientOriginalExtension(), 'pdf') == 0 ||
                strcmp($requestFile->getClientOriginalExtension(), 'PDF') == 0) {
                $file->type = 0;    //pdf file
            } else {
                $file->type = 1;    //image file
            }
        }
        $file->save();

        notify()->flash('<h3>The file has been updated successfully!</h3>', 'success', ['timer' => 2000]);
        return redirect()->route('file.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $file = File::find($id);
        if($file->user_id != Auth::user()->id)
            return false;
        
        //delete all the comments before deleting the file    
        foreach ($file->comments as $comment) {
            $comment->delete();
        }

        //delete the file from the storage
        $myFile = base_path('/public/src/files/'.$file->file_path);
        // unlink($myFile);
        \File::delete($myFile);
        
        $file->delete();

        notify()->flash('<h3>The file has been deleted successfully!</h3>', 'success', ['timer' => 2000]);
        return response()->json(200);
    }

    /**
     * Download the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id){
        $file = File::where('id', '=', $id)->first();
        $extension = \File::extension($file->file_path);
        $myFile = base_path('/public/src/files/'.$file->file_path);
        $headers = ['Content-Type: application/pdf'];
        $newName = $file->title.'.'.$extension;

        return response()->download($myFile, $newName, $headers);
    }
}