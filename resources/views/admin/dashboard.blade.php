@extends('AdminLayout.index')

@section('content')

   <!-- start: page body -->
   <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-3">
    <div class="container-fluid">

        <div class="row g-3 mb-3">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <span>Total Search History</span>
                        <a href="/search-history"><h4 class="mb-0">{{$search}}</h4></a>
                        {{-- <small>23% Average <i class="fa fa-level-up"></i></small> --}}
                    </div>
                    {{-- <div id="apexspark1"></div> --}}
                </div>
            </div>
            @if(Auth::user()->role == 2)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <span>Total Vehicle</span>
                        <a href="/vehicle/list"><h4 class="mb-0">{{$vehicle}}</h4></a>
                        {{-- <small>18% Average <i class="fa fa-level-down"></i></small> --}}
                    </div>
                    {{-- <div id="apexspark2"></div> --}}
                </div>
            </div>
            @endif
            @if(Auth::user()->role == 1)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <span>Total Admin</span>
                        <a href="/admin/list"><h4 class="mb-0">{{$admin}}</h4></a>
                        {{-- <small>57% Average <i class="fa fa-level-up"></i></small> --}}
                    </div>
                    {{-- <div id="apexspark3"></div> --}}
                </div>
            </div>
            @endif
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <span>Total Agent</span>
                        <a href="/agent/list"><h4 class="mb-0">{{$agent}}</h4></a>
                        {{-- <small>13% Average <i class="fa fa-level-up"></i></small> --}}
                    </div>
                    {{-- <div id="apexspark4"></div> --}}
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <a href="/customer/list"><span>Total Customer</span></a>
                        {{-- <h4 class="mb-0">{{count($customer)}}</h4> --}}
                        {{-- <small>13% Average <i class="fa fa-level-up"></i></small> --}}
                    </div>
                    {{-- <div id="apexspark4"></div> --}}
                </div>
            </div> -->
        </div> 
        <!-- .row end -->

        <div class="row g-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title m-0">Product Report</h6>
                        <div class="dropdown morphing scale-left">
                            <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                            <ul class="dropdown-menu shadow border-0 p-2">
                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                <li><a class="dropdown-item" href="#">Block</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="apex-Product-Report"></div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title m-0">Top Selling Country</h6>
                        <div class="dropdown morphing scale-left">
                            <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                            <ul class="dropdown-menu shadow border-0 p-2">
                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                <li><a class="dropdown-item" href="#">Block</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xl-8 col-lg-8 col-md-12">
                                <div id="Top-Country" style="height: 360px;"></div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Contrary</th>
                                                <th>2016</th>
                                                <th>2017</th>
                                                <th>Change</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>USA</td>
                                                <td>2,009</td>
                                                <td>3,591</td>
                                                <td>7.01% <i class="fa fa-level-up text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>India</td>
                                                <td>1,129</td>
                                                <td>1,361</td>
                                                <td>3.01% <i class="fa fa-level-up text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Canada</td>
                                                <td>2,009</td>
                                                <td>2,901</td>
                                                <td>9.01% <i class="fa fa-level-up text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Australia</td>
                                                <td>954</td>
                                                <td>901</td>
                                                <td>5.71% <i class="fa fa-level-down text-warning"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Germany</td>
                                                <td>594</td>
                                                <td>500</td>
                                                <td>6.11% <i class="fa fa-level-down text-warning"></i></td>
                                            </tr>
                                            <tr>
                                                <td>UK</td>
                                                <td>1,500</td>
                                                <td>1,971</td>
                                                <td>8.50% <i class="fa fa-level-up text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Other</td>
                                                <td>4,236</td>
                                                <td>4,591</td>
                                                <td>9.15% <i class="fa fa-level-up text-success"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title m-0">Recent Orders</h6>
                        <div class="dropdown morphing scale-left">
                            <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                            <ul class="dropdown-menu shadow border-0 p-2">
                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                <li><a class="dropdown-item" href="#">Block</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Item</th>
                                        <th>Address</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="assets/images/ecommerce/1.png" class="w30" alt="Product img"></td>
                                        <td>Hossein</td>
                                        <td>IPONE-7</td>
                                        <td>Porterfield 508 Virginia Street Chicago, IL 60653</td>
                                        <td>3</td>
                                        <td><span class="badge bg-success">DONE</span></td>
                                    </tr>
                                    <tr>
                                        <td><img src="assets/images/ecommerce/2.png" class="w30" alt="Product img"></td>
                                        <td>Camara</td>
                                        <td>NOKIA-8</td>
                                        <td>2595 Pearlman Avenue Sudbury, MA 01776 </td>
                                        <td>3</td>
                                        <td><span class="badge bg-info">Delivered</span></td>
                                    </tr>
                                    <tr>
                                        <td><img src="assets/images/ecommerce/3.png" class="w30" alt="Product img"></td>
                                        <td>Maryam</td>
                                        <td>NOKIA-456</td>
                                        <td>Porterfield 508 Virginia Street Chicago, IL 60653</td>
                                        <td>4</td>
                                        <td><span class="badge bg-success">DONE</span></td>
                                    </tr>
                                    <tr>
                                        <td><img src="assets/images/ecommerce/4.png" class="w30" alt="Product img"></td>
                                        <td>Micheal</td>
                                        <td>SAMSANG PRO</td>
                                        <td>508 Virginia Street Chicago, IL 60653</td>
                                        <td>1</td>
                                        <td><span class="badge bg-success">DONE</span></td>
                                    </tr>
                                    <tr>
                                        <td><img src="assets/images/ecommerce/5.png" class="w30" alt="Product img"></td>
                                        <td>Frank</td>
                                        <td>NOKIA-456</td>
                                        <td>1516 Holt Street West Palm Beach, FL 33401</td>
                                        <td>13</td>
                                        <td><span class="badge bg-warning">PENDING</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div> 
        <!-- .row end -->

    </div>
</div>


@endsection