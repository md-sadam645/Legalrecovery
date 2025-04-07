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
                    <form class="row g-3" action="{{url('agent/save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col-6">
                            <label for="TextInput" class="form-label">NAME<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter your name" required name="name">
                        </div>

                        <div class="col-6">
                            <label for="TextInput" class="form-label">MOBILE<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter your mobile" required name="mobile" minlength="10" maxlength="10">
                        </div>
                        <div class="col-6">
                            <label for="TextInput" class="form-label">EMAIL<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
                        </div>
                        <div class="col-6">
                            <label for="TextInput" class="form-label">PASSWORD<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter your password" required name="password" minlength="6">
                        </div>
    
                        <div class="col-6">
                            <label for="TextInput" class="form-label">ADD PHOTO<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="itemimage" required>
                        </div>
    
                        <div class="col-6">
                            <label for="TextInput" class="form-label">ADD AADHAR<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
    
                        <!-- Extra -->
                        <div class="col-6">
                            <input type="checkbox" name="loan_no" value="Loan"> LOAN NO
                        </div>
                        <div class="col-6">
                            <input type="checkbox" name="amount" value="Amount"> AMOUNT
                        </div>
                        <div class="col-6">
                            <input type="checkbox" name="bucket" value="Bucket"> BUCKET
                        </div>
                        <div class="col-6">
                            <input type="checkbox" name="total_amount" value="Total Amount"> TOTAL AMOUNT
                        </div>
                        <div class="col-12">
                            <input type="checkbox" name="emi" value="EMI"> EMI
                        </div>
 
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Add Agent </button>
                        </div>
                    </div>
                </form>
             </div>
        </div>
    </div>
</div>
    
    
@endsection

