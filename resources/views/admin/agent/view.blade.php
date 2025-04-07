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
              <div class="mt-3 mt-lg-0">
                <form action="/search-agent" method="get">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search agent" name="search-agent" value="{{session()->get("agent_search")}}" required />
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="table-responsive">
                <table id="myTable" class="table card-table display dataTable table-hover align-middle">
                    <thead>
                      <tr>
                        <th>NAME</th>
                        <th>MOBILE</th>
                        <th>EMAIL</th>
                        <th>PHOTO</th>
                        <th>AADHAR</th>
                        @if(Auth::user()->role == 1)<th>ADMIN NAME</th>@endif
                        <th>PERMISSION</th>
                        <th>LAST LOGIN</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach($agentlist as $list)
                        <tr>
                            <td class="text-capitalize">{{$list->name}}</td>
                            <td>{{$list->mobile}}</td>
                            <td>{{$list->email}}</td>
                            <td>
                                <a href="{{$list->image}}" target="_blank">
                                    <img class="rounded img-fluid" src="{{$list->image}}" style="height:40px;" alt="{{$list->image}}">
                                </a>
                            </td>
                            <td>
                                <a href="{{$list->aadhar}}" target="_blank">
                                    <img class="rounded img-fluid" src="{{$list->aadhar}}" style="height:40px;" alt="{{$list->aadhar}}">
                                </a>
                            </td>
                            @if(Auth::user()->role == 1)<td class="text-capitalize">{{$list->admin_name}}</td>@endif
                            <td>
                                {{$list->permission}}
                            </td>
                            <td>{{$list->last_login}}</td>
                            
                            <td>
                                @if($list->status=='1') <b class="text-primary">Active</b> @endif
                                @if($list->status==0) <b class="text-danger">Inactive </b>@endif
                            </td>
                            
                            
                            <td>
                               @if(Auth::user()->role == 2) 
                                   <a class="btn btn-success btn-icon btn-sm rounded-pill ms-2" href="{{url('agent/edit/'.$list->id)}}" role="button">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                   <a class="btn btn-info btn-icon btn-sm rounded-pill ms-2" href="{{url('agent/logout/'.$list->id)}}" role="button">
                                      <i class="fa fa-sign-out text-white"></i>
                                    </a>
                                @endif
                                <a class="btn btn-danger btn-icon btn-sm rounded-pill ms-2" href="{{url('agent/delete/'.$list->id)}}" role="button">
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
  @if(!empty($agentlist))
  <center>
      {{ $agentlist->links('vendor.pagination.custom') }}
  </center>
  @endif
  <!-- end pagination -->
</div>


@endsection