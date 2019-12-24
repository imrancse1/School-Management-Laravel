@extends('admin.master')

@section('main-content')
	
	<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">

             @if(Session::get('message'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Message :</strong> {{Session::get('message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            @endif
            
            @if(Session::get('error_message'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error Message :</strong> {{Session::get('error_message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            @endif

            
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">School List</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>School Name</th>
                        <th>Status</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@php($i=1)
                    	@foreach($schools as $school)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$school -> school_name}}</td>
                        
                      <td>{{$school-> status == 1 ? 'Published' : 'Unpublished'}}</td>
                        <td>
                            @if($school-> status == 1)
                            <a href="{{route('schoolList-unpublished',['id'=>$school->id])}}" title="Deactivte" class="btn btn-sm btn-success"><span class="fa fa-arrow-alt-circle-up"></span></a>
                            @else
                            <a href="{{route('schoolList-published',['id'=>$school->id])}}" title="Active" class="btn btn-sm btn-warning"><span class="fa fa-arrow-alt-circle-down"></span></a>
                            @endif
                            <a href="{{route('schoolList-edit',['id'=>$school->id])}}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>

                             <a href="{{route('schoolList-delete',['id'=>$school->id])}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-sm btn-danger"><span class="fa fa-trash-alt"></span></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--Content End-->

@endsection