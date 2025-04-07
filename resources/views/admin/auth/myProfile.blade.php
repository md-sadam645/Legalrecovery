@extends('AdminLayout.index')

@section('content')
<style>
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
{{-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'> --}}
<link rel='stylesheet' href='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css'>
{{-- <link rel='stylesheet' href='https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css'> --}}

<div class="my-profile-con p-2 p-lg-0 my-5 d-lg-flex justify-content-center">
    <div class="col-lg-9 col-md-12">
        <div id="list-item-1" class="card fieldset border border-muted mt-0">
        <!-- form: profile details -->
        <span class="fieldset-tile text-muted bg-body">Profile Details:</span>
        <div class="card">
            <div class="card-body">
                <form action="/profileUpdate" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5">
                        <div class="d-flex justify-content-between col-md-12 col-sm-12 col-form-label">
                            <label>Avatar</label>
                            <b>ID NO : {{Auth::user()->id}}</b>
                        </div>
                        
                        <div class="col-md-12 col-sm-12">
                            <div class="image-input avatar xxl rounded-4" style="background-image: url({{Auth::user()->image}})">
                            <div class="avatar-wrapper rounded-4" style="background-image: url({{Auth::user()->image}})"></div>
                            <div class="file-input">
                                <input type="file" class="form-control" name="profile" id="file-input">
                                <label for="file-input" class="fa fa-pencil shadow text-muted"></label>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-md-3 col-sm-4 col-form-label">Name <span class="text-danger">*</span></label>
                    <div class="col-md-9 col-sm-4">
                        <input type="text" class="form-control form-control-lg" name="name" value="{{Auth::user()->name}}" required>
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-md-3 col-sm-4 col-form-label">Email</label>
                    <div class="col-md-9 col-sm-8">
                        <input type="email" class="form-control form-control-lg" name="email" value="{{Auth::user()->email}}" disabled>
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-md-3 col-sm-4 col-form-label">Mobile <span class="text-danger">*</span></label>
                    <div class="col-md-9 col-sm-8">
                        <input type="text" class="form-control form-control-lg" name="mobile" value="{{Auth::user()->mobile}}" required>
                    </div>
                    </div>
                    
                    
                    <div class="card-footer text-end">
                        <button class="btn btn-lg btn-primary" type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        </div> 
    </div>
</div>

@endsection