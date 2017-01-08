<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\File;

class PageController extends Controller{
    
    public function index(){
        $cseCourses = Course::where('department', 'cse')->limit(5)->get();
        $eeeCourses = Course::where('department', 'eee')->limit(5)->get();
        $bbaCourses = Course::where('department', 'bba')->limit(5)->get();
        return view('pages.index', ['cseCourses' => $cseCourses, 'eeeCourses' => $eeeCourses, 'bbaCourses' => $bbaCourses]);
    }

    public function courseList($department) {
    	$courses = Course::where('department', $department)->paginate(10);	
    	return view('pages.courseList')->withCourses($courses);
    }

    public function fileList() {
        $id = Auth::user()->id;
        $files = File::where('user_id', '=', $id)->paginate(10);  
        return view('pages.fileList')->withFiles($files);
    }
}