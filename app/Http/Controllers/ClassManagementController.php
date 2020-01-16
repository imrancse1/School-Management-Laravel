<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;


class ClassManagementController extends Controller
{
    public function addClass(){
    	return view('admin.setting.class.add-form');
    }

    public function classSave(Request $request){
    	$this->validate($request,[
    		'class_name' => 'required|string' 
    	]);

    	$classNames = new ClassName();
    	$classNames->class_name = $request->class_name;
    	$classNames->status = 1;
    	$classNames->save();

    	return back()->with('message','Add Class Suceessfully');
    }

    public function classList(){
    	$classLists = ClassName::all();
    	return view('admin.setting.class.class-list',['classLists'=>$classLists]);
    }

    public function classListUnpublished($id){
    	$classLists = ClassName::find($id);
        $classLists->status = 2;
        $classLists->save();

        return redirect('/class-list')->with('error_message','class list Unpublished Successfully!');
    }

    public function classListPublished($id){
    	$classLists = ClassName::find($id);
        $classLists->status = 1;
        $classLists->save();

        return redirect('/class-list')->with('message','class list Published Successfully!');
    }

    public function classListEdit($id){
    	$classLists = ClassName::find($id);
    	return view('admin.setting.class.class-edit',['classLists'=> $classLists]);

    }

    public function updateClass(Request $request){

    	$this->validate($request,[
    		'class_name' => 'required|string' 
    	]);
    	 $classLists = ClassName::find($request->classList_id);
        $classLists->class_name = $request->class_name;
        $classLists->status = $request->status;
        $classLists->save();
        return redirect('/class-list')->with('message','Oparation Successfully');

    }
    public function classListDelete($id){
    	  $classLists = ClassName::find($id);
        $classLists->delete();
        return redirect('/class-list')->with('message','Slide Deleted Successfully');
    }
}
