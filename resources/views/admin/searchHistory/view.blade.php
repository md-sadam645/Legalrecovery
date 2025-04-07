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
          
            <div class="card-header py-3 bg-transparent border-bottom-0 d-flex flex-column flex-lg-row justify-content-between">
              <h6 class="card-title mb-0">{{$title}}</h6>
              <div class="mt-3 mt-lg-0 d-flex flex-column flex-lg-row">
                  <a @if(count($list) != 0) href="/search-history/download" @else title="Search History Empty, Cann't Download" @endif class="btn btn-primary" >Download Search History
                  </a>
                  @if(Auth::user()->role == 1)
                  <span class="mt-3 mt-lg-0" style="margin-left:10px;">
                    <button class="btn btn-danger" @if(count($list) != 0) data-bs-toggle="modal" data-bs-target="#staticBackdrop" @else title="Search History Empty, Cann't Delete" @endif> Delete All Search History List
                    </button>
                  </span>
                @endif
              </div>
             
            </div>
         
          <div class="row g-3">
            <div class="col-12">
              <div class="table-responsive">
                <table id="myTable" class="table card-table display dataTable table-hover align-middle">
                  <thead>
                    <tr>
                        <th>REGISTRATION NO</th>
                        <th>CHASSI NO</th>
                        <th>ENGINE NO</th>
                        <th>DATE</th>
                        <th>TIME</th>
                        <th>USER NAME</th>
                        <th>ADMIN NAME</th>
                        @if(Auth::user()->role == 1)<th>ACTION</th>@endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($list as $data)
                        <tr>
                            <td><b>{{$data->registration_numbers}}</b></td>
                            <td>{{$data->chasisnum}}</td>
                            <td>{{$data->enginenum}}</td>
                            <td>{{$data->date}}</td>
                            <td>{{$data->time}}</td>
                            <td>{{$data->user_name}}</td>
                            <td>{{$data->admin_name}}</td>
                            @if(Auth::user()->role == 1)
                                <td>
                                    <a class="btn btn-danger btn-icon btn-sm rounded-pill ms-2" href="{{url('search-history/delete/'.$data->id)}}" role="button">
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
  @if(!empty($list))
  <center>
      {{ $list->links('vendor.pagination.custom') }}
  </center>
  @endif
  <!-- end pagination -->
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center flex-column">
        <i class="fa fa-exclamation-circle text-warning" style="font-size:70px;"></i>
      
        <h5 class="modal-title my-3" id="staticBackdropLabel">Are you sure want to delete all search history list ?</h5>
        <div>
            
            <a href="{{url('search-history/delete_all')}}" type="button" class="btn btn-success">Yes delete it</a>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
 <!-- End: page body -->

@endsection