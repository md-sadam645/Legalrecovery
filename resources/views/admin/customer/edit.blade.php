@extends('AdminLayout.index')

@section('content')


<div class="container" style="margin-bottom:17.5%;">
    <div class="row g-3 clearfix row-deck">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header py-3 bg-transparent border-bottom-0">
                    <h6 class="card-title mb-0">{{$title}}</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{url('customer/update/'.$list->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-12 col-lg-6">
                            <label for="TextInput" class="form-label">NAME</label>
                            <input type="text" class="form-control" required name="name" value="{{$list->name}}" disabled>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <label for="TextInput" class="form-label">MOBILE</label>
                            <input type="text" class="form-control" required name="mobile" value="{{$list->mobile}}" disabled>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <label for="TextInput" class="form-label">EMAIL</label>
                            <input type="email" class="form-control" required name="email" value="{{$list->email}}" disabled>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <label for="TextInput" class="form-label">STATUS</label>
                            <select class="form-control" name="status">
                                <option @if($list->status==1) selected @endif value="1">Active</option>
                                <option @if($list->status==0) selected @endif value="0">Inactive</option>
                            </select>
                        </div>
                        
 
                        <div class="col-md-12 col-lg-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Edit Customer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    

@endsection

