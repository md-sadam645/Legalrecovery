@extends('AdminLayout.index')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
{{-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'> --}}
<link rel='stylesheet' href='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css'>
{{-- <link rel='stylesheet' href='https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css'> --}}


 <!-- start: page body -->
 <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title mb-0">{{$title}}</h6>
            <div class="mt-3 mt-lg-0">
              <form action="/search-customer" method="POST">
                @csrf
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search customer" name="search-customer" required />
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
                
                    @if(Auth::user()->role == 1)<th>ADMIN NAME</th>@endif
                    <th>LAST LOGIN</th>
                    <th>STATUS</th>
                    @if(Auth::user()->role == 2)<th>ACTION</th>@endif
                </tr>
              </thead>
              <tbody>
                @foreach($customerList as $list)
                    <tr>
                        <td>{{$list->name}}</td>
                        <td>{{$list->mobile}}</td>
                        <td>{{$list->email}}</td>

                        @if(Auth::user()->role == 1) 
                            <td>
                                {{$list->admin_name}}
                            </td>
                        @endif
                        <td>{{$list->last_login}}</td>
                        <td>
                            @if($list->status=='1') <b class="text-success">Active</b> @endif
                            @if($list->status==0) <b class="text-danger">Inactive </b>@endif
                        </td>
                        
                        @if(Auth::user()->role == 2)
                            <td>
                                <a class="btn btn-success btn-icon btn-sm rounded-pill ms-2" href="{{url('customer/edit/'.$list->id)}}" role="button">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-icon btn-sm rounded-pill ms-2" href="{{url('customer/delete/'.$list->id)}}" role="button">
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
    </div> <!-- Row end  -->
  </div>
</div>
 <!-- End: page body -->

@endsection