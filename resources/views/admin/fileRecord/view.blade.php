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
            {{-- <button class="btn btn-primary btn-icon btn-sm rounded ms-2 share-modal" data-bs-toggle="modal" data-bs-target="#shareFileRecord" title="Share File Records">
              <i class="fa fa-share"></i>
            </button> --}}
          </div>
          <div class="row g-3">
            <div class="col-12">
              <div class="table-responsive">
                <table id="myTable" class="table card-table display dataTable table-hover align-middle">
                  <thead>
                    <tr>
                      <tr>
                        <th>S.No.</th>
                        {{-- <th>Select</th> --}}
                        <th>File Name</th>
                        <th>Upload By</th>
                        <th>Upload On</th>
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
                        {{-- <td><input class="form-check-input check-file" type="checkbox" value="{{$ldata->id}}"></td> --}}
                        <td class="text-capitalize">{{$ldata->filename}}</td>
                        <td class="text-capitalize">{{$name}}</td>
                        <td>{{date('Y-m-d h:i A',strtotime($ldata->created_at))}}</td>
                        <td>
                          <button class="btn btn-primary btn-icon btn-sm rounded ms-2 share-modal" id="{{$ldata->id}}" data-bs-toggle="modal" data-bs-target="#shareFileRecord" title="Share File Records">
                            <i class="fa fa-share"></i>
                          </button>
                          <a class="btn btn-success btn-icon btn-sm rounded-pill ms-2" href="{{url('file-record/download/'.$ldata->id)}}" role="button">
                            <i class="fa fa-download"></i>
                          </a>
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
            <a type="button" href="{{url('file-record/delete')}}" class="btn btn-success file-btn">Yes delete it</a>
            <button type="button" class="btn btn-danger ms-3" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Shared File Record Modal -->
<div class="modal fade" id="shareFileRecord">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title my-3">Share File Records</h5>
      </div>
      <div class="modal-body">
        <form action="{{url('fileShared')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-4">
            <label for="admin" class="form-label">Select Admin <small class="text-danger">*</small></label>
            {{-- <select multiple data-placeholder="Select Admin" name="admin[]" required>
              @foreach ($admin as $aData)
                <option value="{{$aData->id}}">{{$aData->name}}</option>
              @endforeach
            </select> --}}
             <select class="form-control" name="admin" required>
              @foreach ($admin as $aData)
                <option value="{{$aData->id}}">{{$aData->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-4">
            <label for="admin" class="form-label">Select Downloaded File <small class="text-danger">*</small></label>
            <input type="file" class="form-control" name="csv" accept=".csv" required>
          </div>
          <input type="hidden" class="form-control" id="file" name="file_id">
          <div class="mb-4">
            <button class="btn btn-primary" type="submit">Share <i class="fa fa-share ms-1"></i></button>
            <button type="button" class="btn btn-danger ms-3" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- End: page body -->
  <script src="{{asset('assets/backend/js/dropdown.js')}}"></script>
  <script>
    $(document).ready(function(){
      // $('.share-modal').attr('disabled','disabled');
      // checkField();

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

      //select file
      // $('.check-file').each(function(){
      //     $(this).click(function(){
      //       checkField();
      //     });
      // });


      // function checkField()
      // {
      //   var length = $(".check-file").length;
      //   var notChecked = 0;
      //   $('.check-file').each(function(){
      //     if(this.checked)
      //     {
      //       $('.share-modal').removeAttr('disabled');
      //     }else
      //     {
      //       notChecked = notChecked+1;
      //     }
      //   });

      //   if(notChecked == length)
      //   {
      //     $('.share-modal').attr('disabled','disabled');
      //   }else
      //   {
      //     $('.share-modal').removeAttr('disabled');
      //   }
      // }

      //Open model after checkbox
      $(".share-modal").each(function(){
        $(this).click(function(){
          let value = $(this).attr("id");
          $("#file").val(value);
        });
      });

      //   $('.share-modal').click(function(){
      //     var val = [];
      //     $('.check-file').each(function(index){
      //       if(this.checked)
      //       {
      //         val[index]= this.value;
      //       }
      //     });
      //     $("#file").val(val);
      //   });
      // });
    });
  </script>
@endsection