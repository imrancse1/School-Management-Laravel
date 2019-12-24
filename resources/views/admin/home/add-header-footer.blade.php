@extends('admin.master')

@section('main-content')


<!--Content Start-->
<section class="container-fluid">
    <div class="row content ">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Header And Footer Add Form</h4>
                </div>
            </div>
            <form method="POST" action="{{ route('header-and-footer-save') }}" enctype="multipart/form-data" autocomplete="off" class="form-inline">
                @csrf

                <div class="form-group col-12 mb-3">
                    <label for="ownername" class="col-sm-3 col-form-label text-right">Owner Name</label>
                    <input id="ownername" type="text" class="col-sm-9 form-control @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ old('owner_name') }}" required autocomplete="name" placeholder="owner name" autofocus>
                    @error('owner_name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="ownerDepartment" class="col-sm-3 col-form-label text-right">Owner Department</label>
                    <input id="ownerDepartment" type="text" class="col-sm-9 form-control @error('owner_department') is-invalid @enderror" name="owner_department" value="{{ old('owner_department') }}" required autocomplete="owner_department" placeholder="owner department" autofocus>
                    @error('owner_department')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                    <input id="mobile" type="text" class="col-sm-9 form-control" name="mobile" value="" placeholder="8801xxxxxxxxx" required>
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="address" class="col-sm-3 col-form-label text-right">Address</label>
                    <input id="address" type="text" class="col-sm-9 form-control  @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="address">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="address" class="col-sm-3 col-form-label text-right">Copyright</label>
                    <input id="copyright" type="text" class="col-sm-9 form-control  @error('copyright') is-invalid @enderror" name="copyright" value="{{ old('copyright') }}" required autocomplete="copyright" placeholder="copyright text">
                    @error('copyright')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label class="col-sm-3"></label>
                    <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Submit</button>
                </div>

                <input type="hidden" name="status" value="1">

            </form>
        </div>
    </div>
</section>
@endsection