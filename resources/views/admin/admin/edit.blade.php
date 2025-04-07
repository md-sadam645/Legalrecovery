@extends('AdminLayout.index')

@section('content')


<div class="container mb-4">
    <div class="row g-3 clearfix row-deck">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header py-3 bg-transparent border-bottom-0">
                    <h6 class="card-title mb-0"><b>{{$title}}</b></h6>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{url('admin/update/'.$list->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col-lg-6 col-md-12">
                            <label for="TextInput" class="form-label">NAME<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required name="name" value="{{$list->name}}" >
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <label for="TextInput" class="form-label">MOBILE<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" required minlength="10" maxlength="10" name="mobile" value="{{$list->mobile}}">
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <label for="TextInput" class="form-label">EMAIL<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" required name="email" readonly value="{{$list->email}}">
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <label for="TextInput" class="form-label">STATUS<span class="text-danger">*</span></label>
                            <select class="form-control" name="status" required>
                                <option @if($list->status==1) selected @endif value="1">Active</option>
                                <option @if($list->status==0) selected @endif value="0">Inactive</option>
                            </select>
                        </div>
    
                        <div class="col-lg-6 col-md-12">
                            <label for="TextInput" class="form-label">ADD PHOTO</label>
                            <input type="file" class="form-control" placeholder="ADD PHOTO" name="itemimage">
                            
                            <img class="rounded img-fluid" src="{{$list->image}}" alt="" style="width:60px;margin-top:10px;">
                            <input type="hidden" name="oldimg" value="{{$list->image}}">
                        </div>
    
                        <div class="col-lg-6 col-md-12">
                        <label for="TextInput" class="form-label">ADD ADHAAR</label>
                            <input type="file" class="form-control" placeholder="ADD ADHAAR" name="aadhar">
                            
                            <img class="rounded img-fluid" src="{{$list->aadhar}}" alt="{{$list->aadhar}}" style="width:60px;margin-top:10px;">
                            <input type="hidden" name="oldadhaar" value="{{$list->aadhar}}">
                        </div>

                        <div class="col-12">
                            <label for="TextInput" class="form-label">GST NO<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="GST NO" name="gst" value="{{$list->gst}}" required>
                        </div>
    
                        <div class="col-lg-6 col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Edit Admin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    

@endsection

