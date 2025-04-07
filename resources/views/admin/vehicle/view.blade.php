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
            @if(Auth::user()->role == 2)
              <span>
                  <button class="btn btn-warning text-white" @if(count($vlist) != 0)data-bs-toggle="modal" data-bs-target="#deleteAllDuplicateData" @else title="Duplicate Data Empty, Cann't Delete" @endif>Delete All Duplicate Data</button> &nbsp;
                <button class="btn btn-danger" @if(count($vlist) != 0)data-bs-toggle="modal" data-bs-target="#deleteAllVehicleData" @else title="Vehicle List Empty, Cann't Delete" @endif>Delete All Vehicle List</button>
              </span>
            @endif
          </div>
          <div class="row g-3">
            <div class="col-12">
              @php 
                session()->put("url",url()->full());
              @endphp
              <div class="table-responsive">
                <table id="myTable" class="table card-table display dataTable table-hover align-middle">
                  <thead>
                    <tr>
                      <tr>
                        {{-- <th>S.No.</th> --}}
                        <th>NAME</th>
                        <th>CHASIS NO</th>
                        <th>REGISTRATION NO</th>
                        {{-- <th>ENGINE NO</th>
                        <th>ALLOCATION</th> --}}
                        <th>AGREEMENT ID</th>
                        {{-- <th>EMI AMT</th> 
                        <th>POS</th>
                        <th>TBR</th>
                        <th>BKTS</th>
                        <th>BANK</th>
                        <th>PRODUCT NAME</th>
                        <th>MODEL</th>--}}
                        @if(Auth::user()->role == 1)<th>ADMIN NAME</th>@endif
                        {{-- <th>ADDRESS</th> --}}
                        <th>STATUS</th>
                        @if(Auth::user()->role == 2)<th>ACTION</th>@endif
                      </tr>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @php 
                      $i=1; 
                    @endphp --}}
                    @foreach($vlist as $list)
                      
                    <tr>
                      {{-- <td>{{$i}}</td>
                      @php $i++; @endphp --}}
                      <td>{{$list->username}}</td>
                      <td>{{$list->chasisnum}}</td>
                      <td>{{$list->registration_numbers}}</td>
      
                      {{-- <td>{{$list->enginenum}}</td>
                      <td>{{$list->allocation}}</td> --}}
                      <td>{{$list->agreementid}}</td>
                      {{-- <td>{{$list->emi_amt}}</td>
      
                      <td>{{$list->pos}}</td>
                      <td>{{$list->tbr}}</td>
                      <td>{{$list->bkts}}</td>
                      <td>{{$list->bank}}</td>
                      <td>{{$list->productname}}</td>
                      <td>{{$list->model}}</td> --}}
                      @if(Auth::user()->role == 1) <td>{{$list->add_by_name}}</td>@endif
                      {{-- <td>{{$list->address}}</td> --}}
                      <td>
                        @if($list->status=='1') <b class="text-success btn-xs">Active</b> @endif
                        @if($list->status==0) <b class="text-danger btn-xs">Inactive </b>@endif
                      </td>
                      @if(Auth::user()->role == 2)
                      <td>
                        <a class="btn btn-primary btn-icon btn-sm rounded-pill ms-2" href="{{url('vehicle/view-in-details/'.$list->id)}}" role="button">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-danger btn-icon btn-sm rounded-pill ms-2" href="{{url('vehicle/delete/'.$list->id)}}" role="button">
                            <i class="fa fa-trash"></i>
                        </a>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div> 
    <!-- Row end  -->
  </div>
  
  <!-- start pagination -->
  @if(!empty($vlist))
  <center>
      {{ $vlist->links('vendor.pagination.custom') }}
  </center>
  @endif
  <!-- end pagination -->
</div>


<!-- Modal -->
<div class="modal fade" id="deleteAllVehicleData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center flex-column">
        <i class="fa fa-exclamation-circle text-warning" style="font-size:70px;"></i>
      
        <h5 class="modal-title my-3" id="staticBackdropLabel">Are you sure want to delete all vehicle list ?</h5>
        <div>
            
            <a href="{{url('vehicle/delete_all')}}" type="button" class="btn btn-success">Yes delete it</a>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteAllDuplicateData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center flex-column">
        <i class="fa fa-exclamation-circle text-warning" style="font-size:70px;"></i>
      
        <h5 class="modal-title my-3" id="staticBackdropLabel">Are you sure want to delete all Duplicate data ?</h5>
        <div>
            
            <a href="{{url('duplicate-data/delete')}}" type="button" class="btn btn-success">Yes delete it</a>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
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