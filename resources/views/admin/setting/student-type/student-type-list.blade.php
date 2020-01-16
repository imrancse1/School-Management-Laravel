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
                    <h4 class="text-center font-weight-bold font-italic mt-3">Student Type List <button class="bg-success text-light" data-toggle="modal" data-target="#studentTypeAddModal">Add New</button></h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Student Name</th>
                        <th>Student Type</th>
                        <th>Status</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody id="studentTypeTable">

                        @include('admin.setting.student-type.student-type-table')

                        
                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--Content End-->


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="studentTypeAddModal" tabindex="-1" role="dialog" aria-labelledby="studentTypeAddModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Student Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('student-type-add')}}" method="POST" id="studentTypeInsert">
        @csrf
      <div class="modal-body">
        
        <div class="form-group row ">
                          <label for="classId" class="col-form-label col-sm-3 text-right">Class Name</label>
                         <div class="col-sm-9">
                            <select name="class_id" class="form-control  @error('class_id') is-invalid @enderror" id="classId" required="">
                                <option value="">===Select Class===</option>

                                 @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->class_name}}</option>
                                @endforeach
                            </select>
                         @error('class_id')
                         <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                         @enderror
                         </div>
                     </div>

              <div class="form-group row mb-0">
                          <label for="studentType" class="col-form-label col-sm-3 text-right">Student Type</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control @error('student_type') is-invalid @enderror" name="student_type" value="{{ old('student_type') }}" id="studentType" placeholder="Student Type" required>
                         @error('student_type')
                         <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                         @enderror
                         </div>
                     </div>       

      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-warning" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script >
    $('#studentTypeInsert').submit(function (e) {
       e.preventDefault();
       var url = $(this).attr('action');
       var data = $(this).serialize(); 
       var method = $(this).attr('method');

       $('#studentTypeAddModal #reset').click();
       $('#studentTypeAddModal').modal('hide');

       $.ajax({
        type : method,
        url : url,
        data : data,
        success : function () {
            $.get("{{route('student-type-list')}}", function (data){
                $('#studentTypeTable'),empty().html(data);
            })
        }
       })
    })
</script>

@endsection