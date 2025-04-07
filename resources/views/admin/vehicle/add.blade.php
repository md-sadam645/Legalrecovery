@extends('AdminLayout.index')
<style>
    .page-footer
    {
        position:fixed;
        bottom: 0px;
    }
</style>

@section('content')


<div class="container add-excel">
    <div class="row g-3 clearfix row-deck">
        <div class="col-12 d-flex justify-content-end">
            <a href="../files/csvFormat.csv" download="csvFormat" class="btn btn-primary">Download Csv Format</a>
        </div>
        <div class="col-lg-12 col-md-12">
            
            <div class="card">
                <div class="card-header py-3 bg-transparent border-bottom-0">
                    <h6 class="card-title mb-0">{{$title}}</h6>
                </div>
                <div class="card-body">
                <form class="row g-3" action="{{url('importVehicle')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   <div class="col-md-12 col-lg-6">
                        <label for="TextInput" class="form-label">Csv File Upload</label>
                        <input type="file" class="form-control" name="csv"  accept=".csv" required>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Add Vehicle  </button>
                    </div>
                    <!--<div class="col-6">
                        <label for="TextInput" class="form-label">AGRNO</label>
                        <input type="text" class="form-control" placeholder="AGRNO" name="agrno">
                    </div>
                    <div class="col-6">
                        <label for="TextInput" class="form-label">CUSTOMER NAME</label>
                        <input type="text" class="form-control" placeholder="CUSTOMER NAME" name="cust_name">
                    </div>
                    <div class="col-6">
                        <label for="TextInput" class="form-label">CURR BUCK</label>
                        <input type="text" class="form-control" placeholder="CURR BUCK" name="curr_buck">
                    </div>
                   
                    <div class="col-12">
                        <label for="textareaInputD" class="form-label">ASSET</label>
                        <textarea name="" cols="30" rows="5" class="form-control" name="asset" placeholder="ASSET" ></textarea>
                    </div>
                    <div class="col-6">
                        <label for="TextInput" class="form-label">CHASSI NO</label>
                        <input type="text" class="form-control" placeholder="CHASSI NO" name="chassino">
                    </div>
                    <div class="col-6">
                        <label for="TextInput" class="form-label">REG NO</label>
                        <input type="text" class="form-control" placeholder="REG NO" name="regno">
                    </div>
                    <div class="col-6">
                        <label for="TextInput" class="form-label">ENGINE NO</label>
                        <input type="text" class="form-control" placeholder="ENGINE NO" name="engineno">
                    </div>-->
                    
                    <div class="col-6"></div>
                    
                    <div class="col-md-12 col-lg-6">
                        
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
    
@endsection

