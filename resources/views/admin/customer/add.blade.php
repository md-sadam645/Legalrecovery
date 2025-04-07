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
                    <form class="row g-3" action="{{url('agent/save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col-6">
                            <label for="TextInput" class="form-label">AGENT NAME</label>
                            <input type="text" class="form-control" placeholder="AGENT NAME" name="name">
                        </div>

                        <div class="col-6">
                            <label for="TextInput" class="form-label">AGENT MOBILE NO</label>
                            <input type="text" class="form-control" placeholder="AGENT MOBILE NO" name="mobile">
                        </div>
                        <div class="col-6">
                            <label for="TextInput" class="form-label">AGENT EMAIL</label>
                            <input type="text" class="form-control" placeholder="AGENT EMAIL" name="email">
                        </div>
                        <div class="col-6">
                            <label for="TextInput" class="form-label">CREATE PASSWORD</label>
                            <input type="text" class="form-control" placeholder="CREATE PASSWORD" name="password">
                        </div>
    
                        <div class="col-6">
                            <label for="TextInput" class="form-label">ADD PHOTO</label>
                            <input type="file" class="form-control" placeholder="ADD PHOTO" name="itemimage">
                        </div>
    
                        <div class="col-6">
                            <label for="TextInput" class="form-label">ADD ADHAAR</label>
                            <input type="file" class="form-control" placeholder="ADHAAR NO" name="image">
                        </div>
    
                        <!-- Extra -->
                        <div class="col-6">
                            <input type="checkbox" placeholder="LOAN NO" name="loan_no" value="Loan"> LOAN NO
                        </div>
                        <div class="col-6">
                            <input type="checkbox" placeholder="AMOUNT" name="amount" value="Amount"> AMOUNT
                        </div>
                        <div class="col-6">
                            <input type="checkbox" placeholder="BUCKET" name="bucket" value="Bucket"> BUCKET
                        </div>
                        <div class="col-6">
                            <input type="checkbox" placeholder="TOTAL AMOUNT" name="total_amount" value="Total Amount"> TOTAL AMOUNT
                        </div>
                        <div class="col-12">
                            <input type="checkbox" placeholder="EMI" name="emi" value="EMI"> EMI
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

