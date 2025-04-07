@extends('AdminLayout.index')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
{{-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'> --}}
<link rel='stylesheet' href='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css'>
{{-- <link rel='stylesheet' href='https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css'> --}}




<div class="page-body mb-3 px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
  <div class="container-fluid mb-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title mb-0">{{$title}}</h6>
            <div class="mt-3 mt-lg-0">
              <form action="/search-admin" method="POST">
                @csrf
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search admin" name="search-admin" required />
                  <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
              </form>
            </div>
          </div>
          <div class="table-responsive">
            <table id="myTable" class="table card-table display dataTable table-hover align-middle">
              <thead>
                <tr>
                    {{-- <th>S.NO.</th> --}}
                    <th>NAME</th>
                    <th>MOBILE</th>
                    <th>EMAIL</th>
                    <th>PHOTO</th>
                    <th>ADHAAR</th>
                    <th>LAST LOGIN</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                    {{-- @php $i=1; @endphp --}}
                    @foreach($list as $listData)
                        <tr>
                            {{-- <td>{{$i}}</td>@php $i++; @endphp --}}

                            <td>{{$listData->name}}</td>
                            <td>{{$listData->mobile}}</td>
                            <td>{{$listData->email}}</td>
                            <td>
                                <a href="{{$listData->image}}" target="_blank">
                                    <img class="rounded img-fluid" src="{{$listData->image}}" style="height:50px;" alt="{{$listData->image}}">
                                </a>
                            </td>
                            <td>
                                <a href="{{$listData->aadhar}}" target="_blank">
                                    <img class="rounded img-fluid" src="{{$listData->aadhar}}" style="height:50px;" alt="{{$listData->aadhar}}">
                                </a>
                            </td>
                            <td>
                              {{$listData->last_login}}
                            </td>
                            <td>
                                @if($listData->status=='1') <b class="text-success">Active</b> @endif
                                @if($listData->status==0) <b class="text-danger">Inactive </b>@endif
                            </td>
                            <td>
                                <a href="{{url('admin/edit/'.$listData->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                <a href="{{url('admin/delete/'.$listData->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
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
@endsection