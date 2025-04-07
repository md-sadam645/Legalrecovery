@extends('AdminLayout.index')

@section('content')


<div class="container">
    <div class="row g-3 clearfix row-deck">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header py-3 bg-transparent border-bottom-0">
                    <h6 class="card-title mb-0">{{$title}}</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{url('vehicle/update/'.$list[0]->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col-6">
                            <label for="TextInput" class="form-label">PROD</label>
                            <input type="text" class="form-control" placeholder="AGENT NAME" name="prod" value="{{$list[0]->prod}}">
                        </div>

                        <div class="col-6">
                            <label for="TextInput" class="form-label">AGRNO</label>
                            <input type="text" class="form-control" placeholder="AGENT MOBILE NO" name="agrno" value="{{$list[0]->agrno}}">
                        </div>
                        <div class="col-6">
                            <label for="TextInput" class="form-label">CUST NAME</label>
                            <input type="text" class="form-control" placeholder="AGENT EMAIL" name="cust_name" value="{{$list[0]->cust_name}}">
                        </div>
                        <div class="col-6">
                            <label for="TextInput" class="form-label">AGENT STATUS</label>
                            <select class="form-control" name="status">
                                <option @if($list[0]->status==1) selected @endif value="1">Active</option>
                                <option @if($list[0]->status==0) selected @endif value="0">Inactive</option>
                            </select>
                        </div>
    
                        
 
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">{{$title}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    

@endsection

