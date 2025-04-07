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
                        <th>NAME</th>
                        <th>Created On</th>
                        <th>Logo</th>
                        <th>Seal</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $ldata)
                        <tr>
                            <td class="text-capitalize">{{$ldata->name}}</td>
                            <td>{{date("Y-m-d",strtotime($ldata->created_at))}}</td>
                            <td>
                              @if(!empty($ldata->logo))<a href="{{url('letterDoc/'.$ldata->logo)}}" target="_blank"><img src="{{url('letterDoc/'.$ldata->logo)}}" width="80" /></a> @endif
                            </td>
                            <td>
                              @if(!empty($ldata->seal))<a href="{{url('letterDoc/'.$ldata->seal)}}" target="_blank"><img src="{{url('letterDoc/'.$ldata->seal)}}" width="80" /></a> @endif
                            </td>
                            <td>
                                @if($ldata->status==0) <b class="text-danger">Inactive</b>@endif
                                @if($ldata->status==1) <b class="text-success">Active</b> @endif
                            </td>
                            <td>
                                <a class="btn btn-info btn-icon btn-sm rounded-pill ms-2" title="View Letter" href="{{url('letter/preview/'.$ldata->id)}}" role="button">
                                    <i class="fa fa-eye text-white"></i>
                                </a>
                                <a class="btn btn-primary btn-icon btn-sm rounded-pill ms-2" title="Edit Letter" href="{{url('letter/edit/'.$ldata->id)}}" role="button">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-icon btn-sm rounded-pill ms-2" title="Delete Letter" href="{{url('letter/delete/'.$ldata->id)}}" role="button">
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