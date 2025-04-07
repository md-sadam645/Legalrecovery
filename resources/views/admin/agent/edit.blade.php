@extends('AdminLayout.index')

@section('content')


<div class="container mb-3">
    <div class="row g-3 clearfix row-deck">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header py-3 bg-transparent border-bottom-0">
                    <h6 class="card-title mb-0">{{$title}}</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{url('agent/update/'.$list->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col-6">
                            <label for="TextInput" class="form-label">NAME<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{$list->name}}" required>
                        </div>

                        <div class="col-6">
                            <label for="TextInput" class="form-label">MOBILE<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="mobile" value="{{$list->mobile}}" minlength="10" maxlength="10" required>
                        </div>
                        <div class="col-6">
                            <label for="TextInput" class="form-label">EMAIL<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" readonly name="email" value="{{$list->email}}" required>
                        </div>
                        <div class="col-6">
                            <label for="TextInput" class="form-label">STATUS<span class="text-danger">*</span></label>
                            <select class="form-control" name="status" required>
                                <option @if($list->status==1) selected @endif value="1">Active</option>
                                <option @if($list->status==0) selected @endif value="0">Inactive</option>
                            </select>
                        </div>
    
                        <div class="col-6">
                            <label for="TextInput" class="form-label">ADD PHOTO</label>
                            <input type="file" class="form-control" placeholder="ADD PHOTO" name="itemimage">
                            
                            <img class="rounded img-fluid" src="{{$list->image}}" alt="{{$list->image}}" style="width:60px;margin-top:10px;">
                            <input type="hidden" name="oldimg" value="{{$list->image}}">
                        </div>
    
                        <div class="col-6">
                        <label for="TextInput" class="form-label">ADD AADHAR</label>
                            <input type="file" class="form-control" placeholder="ADD AADHAR" name="aadhar">
                            
                            <img class="rounded img-fluid" src="{{$list->aadhar}}" alt="{{$list->aadhar}}" style="width:60px;margin-top:10px;">
                            <input type="hidden" name="oldaadhar" value="{{$list->aadhar}}">
                        </div>
    
                        <!-- Extra -->
                        @php $per = $list->permission; @endphp
                        @php $perr = explode(',',$per) @endphp
                        
                        <div class="col-6">
                            <input @if(strtolower($perr[0]) =='loan') checked @endif type="checkbox" placeholder="LOAN NO" name="loan_no" value="Loan"> LOAN NO
                        </div>
                        <div class="col-6">
                            <input @if(strtolower($perr[1]) =='amount') checked @endif type="checkbox" placeholder="AMOUNT" name="amount" value="Amount"> AMOUNT
                        </div>
                        <div class="col-6">
                            <input @if(strtolower($perr[2]) =='bucket') checked @endif type="checkbox" placeholder="BUCKET" name="bucket" value="Bucket"> BUCKET
                        </div>
                        <div class="col-6">
                            <input @if(strtolower($perr[3]) =='total amount') checked @endif type="checkbox" placeholder="TOTAL AMOUNT" name="total_amount" value="Total Amount"> TOTAL AMOUNT
                        </div>
                        <div class="col-12">
                            <input @if(strtolower($perr[4]) =='emi') checked @endif type="checkbox" placeholder="EMI" name="emi" value="EMI"> EMI
                        </div>
 
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Edit Agent</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    

@endsection

