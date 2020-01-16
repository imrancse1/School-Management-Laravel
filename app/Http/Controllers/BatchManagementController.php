<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;
use App\Batch;
class BatchManagementController extends Controller
{
    public function addBatch(){
    	$classs = ClassName::all();
    	return view('admin.setting.batch.add-batch-form',['classs'=> $classs]);
    }

    public function batchSave(Request $request){
    	$this->validate($request, [
    		'class_id' => 'required',
    		'batch_name' => 'required|string',
    		'student_capacity' => 'required'
    	]);
    	
    	$batchs = new Batch();
    	print_r($batchs);
    	$batchs->class_id = $request->class_id;
    	$batchs->batch_name = $request->batch_name;
    	$batchs->student_capacity = $request->student_capacity;
    	$batchs->status = 1;
    	$batchs->save();
    	return back()->with('message','Add Batch Suceessfully');
    }

    public function batchList(){
    	$classs = ClassName::all();
    	return view('admin.setting.batch.batch-list',['classs'=> $classs]);
    }

    public function batchListByAjax(Request $request){
    	$batches = Batch::where([
    		'class_id'=>$request->id
    	])->get();
    	if (count($batches)>0) {
    		
    	return view('admin.setting.batch.batch-list-by-ajax',['batches'=> $batches]);
    	}else{
    		return view('admin.setting.batch.batch-list-emtry',['batches'=> $batches]);
    	}
    }

    public function batchUnpublished(Request $request){
    	$batch = Batch::find($request->batch_id);
    	$batch->status = 2;
    	$batch->save();

    	$batches = Batch::where([
    	'class_id'=>$request->class_id
    	])->get();

    	return view('admin.setting.batch.batch-list-by-ajax',['batches'=> $batches]);
    }
    
     public function batchPublished(Request $request){
    	$batch = Batch::find($request->batch_id);
    	$batch->status = 1;
    	$batch->save();

    	$batches = Batch::where([
    	'class_id'=>$request->class_id
    	])->get();

    	return view('admin.setting.batch.batch-list-by-ajax',['batches'=> $batches]);
    }

    public function batchDelete(Request $request){
    	$batch = Batch::find($request->batch_id);
    	$batch->delete();

    	$batches = Batch::where([
    	'class_id'=>$request->class_id
    	])->get();
    	if (count($batches)>0) {
    		return view('admin.setting.batch.batch-list-by-ajax',['batches'=> $batches]);
    	}else{
    		return view('admin.setting.batch.batch-list-emtry',['batches'=> $batches]);	
    	}
    	
    }

    public function batchEdit($id){
    	$batch = Batch::find($id);
    	$classes = ClassName::all();
    	return view('admin.setting.batch.batch-edit-form',[
    		'classes'=>$classes,
    		'batch'=>$batch
    	]);
    }

    public function batchUpdate(Request $request){
		$this->validate($request, [
    		'class_id' => 'required',
    		'batch_name' => 'required|string',
    		'student_capacity' => 'required'
    	]);

    	$batch = Batch::find($request->batch_id);
    	$batch->class_id = $request->class_id;
    	$batch->batch_name = $request->batch_name;
    	$batch->student_capacity = $request->student_capacity;
    	$batch->save();

    	return redirect('/batch/list')->with('message','Batch info update successfully.');

    }

   
}
