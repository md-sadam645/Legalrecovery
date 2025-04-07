@extends('AdminLayout.index')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css'>

<div class="page-body mb-3 px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid mb-3">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">{{$title}}</h6>
            </div>
            <div class="table-responsive">
                <table id="myTable" class="table card-table display dataTable table-hover align-middle">
                    <thead>
                      <tr>
                        <th>REGISTRATION NO</th>
                        <th>CUSTOMER NAME</th>
                        <th>AGENT NAME</th>
                        <th>Bank NAME</th>
                        <th>LETTER NAME</th>
                        <th>DOWNLOAD LINK</th>
                        <th>Request On</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $ldata)
                        <tr>
                            <td class="text-capitalize">{{$ldata->registration_numbers}}</td>
                            <td class="text-capitalize">{{$ldata->username}}</td>
                            <td class="text-capitalize">{{$ldata->agentName}}</td>
                            <td class="text-capitalize">{{$ldata->bank}}</td>
                            <td class="text-capitalize">{{$ldata->letterName}}</td>
                            <td class="text-capitalize">
                              <a class="btn btn-success" @if(!empty($ldata->link)) href="{{$ldata->link}}" @endif>Letter</a>
                              <a class="btn btn-primary" @if(!empty($ldata->envolop_link)) href="{{$ldata->envolop_link}}" @endif>Envolop</a>
                            </td>
                            <td>{{date("Y-m-d",strtotime($ldata->created_at))}}</td>
                            <td>
                                @if($ldata->status==0) <b class="text-info">Pending </b>@endif
                                @if($ldata->status==1) <b class="text-primary">Approved</b> @endif
                                @if($ldata->status==2) <b class="text-danger">Rejected </b>@endif
                            </td>
                            <td>
                                <a class="btn btn-success btn-icon btn-sm rounded-pill ms-2" title="Approved" @if($ldata->status==2 || $ldata->status==0) href="{{url('request-letter/approve/'.$ldata->id)}}" @endif role="button">
                                    <i class="fa fa-check-circle-o" style="font-size: 15px;"></i>
                                </a>
                                <a class="btn btn-warning btn-icon btn-sm rounded-pill ms-2" title="Reject" @if($ldata->status==1 || $ldata->status==0) href="{{url('request-letter/reject/'.$ldata->id)}}" @endif role="button">
                                    <i class="fa fa-times-circle-o text-white" style="font-size: 15px;"></i>
                                </a>
                               
                                <a class="btn btn-danger btn-icon btn-sm rounded-pill ms-2" title="Delete" href="{{url('request-letter/delete/'.$ldata->id)}}" role="button">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                           
                        </tr>
                    @endforeach
                     
                    </tbody>
                    <tfoot>
                    
                    </tfoot>
                </table>
            </div>
          </div>
        </div>
      </div> <!-- Row end  -->
    </div>


    <!-- start pagination -->
  @if(!empty($list))
  <center>
      {{ $list->links('vendor.pagination.custom') }}
  </center>
  @endif
  <!-- end pagination -->
</div>


@endsection