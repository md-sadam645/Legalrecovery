@extends('AdminLayout.index')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
{{-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'> --}}
<link rel='stylesheet' href='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css'>
{{-- <link rel='stylesheet' href='https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css'> --}}



 <!-- start: page body -->
 <div class="page-body mb-3 px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
  <div class="container-fluid mb-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header py-3 bg-transparent border-bottom-0 d-flex justify-content-between">
                <h6 class="card-title mb-0">{{$title}}</h6>
                {{-- @if(Auth::user()->role == 2)<span><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete All Vehicle List</button></span>@endif --}}
            </div>
            <div class="row g-3 px-4 my-3">
                <div class="col-md-4">
                    <h6 class="fw-bold">NAME</h6>
                    <p>{{$list->username}}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">CHASIS NO</h6>
                    <p>{{$list->chasisnum}}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">REGISTRATION NO</h6>
                    <p>{{$list->registration_numbers}}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">ENGINE NO</h6>
                    <p>{{$list->enginenum}}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">ALLOCATION</h6>
                    <p>{{$list->allocation}}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">AGREEMENT ID</h6>
                    <p>{{$list->agreementid}}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">EMI AMT</h6>
                    <p>{{$list->emi_amt}}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">POS</h6>
                    <p>{{$list->pos}}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">TBR</h6>
                    <p>{{$list->tbr}}</p>
                </div>

                <div class="col-md-4">
                    <h6 class="fw-bold">BKTS</h6>
                    <p>{{$list->bkts}}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">BANK</h6>
                    <p>{{$list->bank}}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">PRODUCT NAME</h6>
                    <p>{{$list->productname}}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold">MODEL</h6>
                    <p>{{$list->model}}</p>
                </div>

                @if(Auth::user()->role == 1)
                <div class="col-md-4">
                    <h6 class="fw-bold">ADMIN NAME</h6>
                    <p class="text-capitalize">{{$list->add_by_name}}</p>
                </div>
                @endif
                {{-- <div class="col-md-4">
                    <h6 class="fw-bold">STATUS</h6>
                    <p>
                        @if($list->status=='1') <b class="text-success btn-xs">Active</b> @endif
                        @if($list->status==0) <b class="text-danger btn-xs">Inactive </b>@endif
                    </p>
                </div> --}}
                <div class="col-md-12">
                    <h6 class="fw-bold">ADDRESS</h6>
                    <p>{{$list->address}}</p>
                </div>
                <div class="col-md-12">
                    <a class="btn btn-primary btn-icon px-3" href="{{session()->get("url")}}" role="button">
                        <i class="fa fa-chevron-circle-left"></i>
                        Back
                    </a>
                </div>
            </div> 
        </div>
      </div>
    </div> 
    <!-- Row end  -->
  </div>
</div>


<!-- End: page body -->
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js'></script>
    <script src='https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js'></script>
    
   <script>
    $('table').DataTabledd();
   </script>
   <script language="javascript">
    document.onmousedown=disableclick;
    status="Right Click Disabled";
    Function disableclick(event)
    {
      if(event.button==2)
       {
         alert(status);
         return false;    
       }
    }

    </script>


@endsection