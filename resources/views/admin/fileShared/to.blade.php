@extends('AdminLayout.index')

<link rel="stylesheet" href="{{asset('assets/backend/css/dropdown.css')}}">
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css'>


@if(strpos(url()->full(),'page='))
  @php
    $url = explode("?page=",url()->full());
    $page = ($url[1]-1)*10;
  @endphp
@endif
 <!-- start: page body -->
 <div class="page-body mb-3 px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
  <div class="container-fluid mb-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header py-3 bg-transparent border-bottom-0 d-flex justify-content-between">
            <h6 class="card-title mb-0">{{$title}}</h6>
          </div>
          <div class="row g-3">
            <div class="col-12">
              <div class="table-responsive">
                <table id="myTable" class="table card-table display dataTable table-hover align-middle">
                  <thead>
                    <tr>
                      <tr>
                        <th>S.No.</th>
                        <th>File Name</th>
                        <th>Shared</th>
                        <th>Received</th>
                        <th>Received At</th>
                        <th>ACTION</th>
                      </tr>
                    </tr>
                  </thead>
                  <tbody>
                    @php 
                      $i=1; 
                    @endphp
                    @foreach($list as $ldata)
                      <tr>
                        <td>
                          @if(!empty($page))
                            {{$page+$i}}
                          @else
                            {{+$i}}
                          @endif
                        </td>
                        @php $i++; @endphp
                        <td class="text-capitalize">{{$ldata->filename}}</td>
                        <td class="text-capitalize">{{$ldata->share_from_name}}</td>
                        <td class="text-capitalize">{{$ldata->share_to_name}}</td>
                        <td>{{date('Y-m-d h:i A',strtotime($ldata->created_at))}}</td>
                        <td>
                          <a class="btn btn-danger btn-icon btn-sm rounded-pill ms-2 delete-file" id="{{$ldata->id}}" role="button">
                            <i class="fa fa-trash"></i>
                          </a>
                        </td>
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
<div class="modal fade" id="deleteAllVehicleData">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center flex-column">
        <i class="fa fa-exclamation-circle text-warning" style="font-size:70px;"></i>
      
        <h5 class="modal-title my-3" id="staticBackdropLabel">Are you sure want to delete, this file all record ?</h5>
        <div>
            <a type="button" href="{{url('file/received/delete')}}" class="btn btn-success file-btn">Yes delete it</a>
            <button type="button" class="btn btn-danger ms-3" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End: page body -->
  <script>
    $(document).ready(function(){

      //Delete file record
      $('.delete-file').each(function(){
        $(this).click(function(){
          let id = $(this).attr('id');
          let href = $('.file-btn').attr('href');
          let fullUrl = href+"/"+id;
          $('#deleteAllVehicleData').modal('show');
          $('.file-btn').attr('href',fullUrl);
        });
      });
    });
  </script>
@endsection