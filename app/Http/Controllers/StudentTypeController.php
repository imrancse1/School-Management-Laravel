<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ClassName;
use App\StudentType;

class StudentTypeController extends Controller
{
    public function index(){
    	$studentTypes = DB:: table('student_types')
    					->join('class_names','student_types.class_id','=','class_names.id')
    					->select('student_types.*','class_names.class_name')
    					->get();
    	$classes = ClassName::all();
    					//return $studentTypes;
    	return view('admin.setting.student-type.student-type-list',[
    		'studentTypes'=> $studentTypes,
    		'classes'=> $classes
    	]);
    }

    public function studentTypeAdd(Request $request){
    	if ($request->ajax()) {
    		$data = new StudentType();
    		$data-> class_id = $request->class_id;
    		$data-> student_type = $request->student_type;
    		$data-> status = 1;
    		$data-> save();

    	}
    }

    public function studentTypeList(){
    	$studentTypes = DB:: table('student_types')
    					->join('class_names','student_types.class_id','=','class_names.id')
    					->select('student_types.*','class_names.class_name')
    					->get();
    	$classes = ClassName::all();
    					//return $studentTypes;
    	return view('admin.setting.student-type.student-type-table',[
    		'studentTypes'=> $studentTypes,
    		'classes'=> $classes
    	]);
    }
}
