@extends('AdminLayout.index')
<style>
    .page-footer
    {
        position:fixed;
        bottom: 0px;
    }
</style>
@section('content')


<div class="container">
    <div class="row g-3 clearfix row-deck">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header py-3 bg-transparent border-bottom-0">
                    <h6 class="card-title mb-0">{{$title}}</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{url('admin/save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 col-lg-6">
                            <label for="TextInput" class="form-label">NAME<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter your name" name="name" required>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <label for="TextInput" class="form-label">MOBILE<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" required placeholder="Enter your mobile" name="mobile" minlength="10" maxlength="10">
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <label for="TextInput" class="form-label">EMAIL<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <label for="TextInput" class="form-label">PASSWORD<span class="text-danger">*</span></label>
                            <input type="password" required class="form-control" placeholder="Enter your password" name="password" minlength="6">
                        </div>
    
                        <div class="col-md-12 col-lg-6">
                            <label for="TextInput" class="form-label">ADD PHOTO<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="itemimage" required>
                        </div>
    
                        <div class="col-md-12 col-lg-6">
                            <label for="TextInput" class="form-label">ADD ADHAAR<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image" required>
                        </div>

                        <div class="col-md-12 col-lg-12">
                            <label for="TextInput" class="form-label">Enter your gst no<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="GST NO" name="gst" required>
                        </div>
    
                        <div class="col-md-12 col-lg-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Add Admin </button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
    
    
@endsection

