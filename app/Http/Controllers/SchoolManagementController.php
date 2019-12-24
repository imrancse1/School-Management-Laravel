<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;

class SchoolManagementController extends Controller
{
    public function addSchool(){
    	return view('admin.setting.school.add-form');
    }

    public function schoolSave(Request $request){
    	$this->validate($request,[
    		'school_name' => 'required|string' 

    	]);
    	$data = new School();
    	$data->school_name = $request->school_name;
    	$data->status = 1;
    	$data->save();

    	return back()->with('message','Add School Suceessfully');
    }

    public function schoolList(){
    	$schools = School::all();
    	return view('admin.setting.school.list',['schools'=>$schools]);
    }

    public function schoolUnpublished($id){
        $lists = School::find($id);
        $lists->status = 2;
        $lists->save();

        return redirect('/school/list')->with('error_message','school list Unpublished Successfully!');
    }
 
    public function schoolListPublished($id){
    	$lists = School::find($id);
        $lists->status = 1;
        $lists->save();

        return redirect('/school/list')->with('message','school list published Successfully!');
    }

    public function schoolListEdit($id){
    	$lists = School::find($id);
    	return view('admin.setting.school.school-edit',['lists'=> $lists]);
    }

    public function updateSchool(Request $request){
    	 $lists = School::find($request->list_id);
        $lists->school_name = $request->school_name;
        $lists->status = $request->status;
        $lists->save();
        return redirect('/school/list')->with('message','Oparation Successfully');

    }

    public function schoolListDelete($id){

        $lists = School::find($id);
        $lists->delete();
        return redirect('/school/list')->with('message','Slide Deleted Successfully');
    }
}
