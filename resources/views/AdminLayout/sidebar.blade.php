  <!-- start: sidebar -->
  <div class="sidebar p-2 py-md-3">
    <div class="container-fluid">
        <!-- sidebar: title-->
        <div class="title-text d-flex align-items-center mb-4 mt-1">
            <h4 class="sidebar-title mb-0 flex-grow-1">
                <a href="/dashboard" class="text-black">
                    <img src="https://legalrecovery.awd.world/images/logo/lg_header_white.png" width="240px"/>
                    <!--<span class="sm-txt">Legal</span><span> Recovery</span>-->
                </a>
            </h4>
            {{-- <div class="dropdown morphing scale-left">
                <a class="dropdown-toggle more-icon" href="#" role="button" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                <ul class="dropdown-menu shadow border-0 p-2 mt-2" data-bs-popper="none">
                    <li class="fw-bold px-2">Quick Actions</li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item active" href="index.html" aria-current="page">Overview</a></li>
                    <li><a class="dropdown-item" href="inventory/index.html">Inventory</a></li>
                    <li><a class="dropdown-item" href="ecommerce/index.html">eCommerce</a></li>
                    <li><a class="dropdown-item" href="hrms/index.html">HRMS</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="account-invoices.html">Invoices List</a></li>
                    <li><a class="dropdown-item" href="account-create-invoices.html">Create Invoices</a></li>
                </ul>
            </div> --}}
        </div>
        <!-- sidebar: Create new -->
        {{-- <div class="create-new py-3 mb-2">
            <div class="d-flex">
                <select class="form-select rounded-pill me-1">
                    <option selected>Add Product</option>
                    <option value="1">Luno University</option>
                    <option value="2">Book Manager</option>
                    <option value="3">Luno Sass App</option>
                </select>
                <button class="btn bg-primary text-white rounded-circle" data-bs-toggle="modal" data-bs-target="#CreateNew" type="button"><i class="fa fa-plus"></i></button>
            </div>
        </div> --}}
        <!-- sidebar: menu list -->
        <div class="main-menu flex-grow-1">
            <ul class="menu-list">
                <li class="divider py-2 lh-sm"><span class="small">MAIN</span><br> <small class="text-muted">Features at glance </small></li>
                <li>
                    <a class="m-link @if($title=='Dashboard'){ active } @endif" href="{{route('dashboard')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path class="fill-secondary" fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                        <span class="ms-2">My Dashboard</span>
                    </a>
                </li>
                <li class="collapsed">
                    <a class="m-link" href="/search-history">
                        <div xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <span class="arrow fa fa-search ms-auto text-end"></span>
                        </div>
                        <span class="ms-2">Search History</span>
                    </a>
                </li>
               
                @if(Auth::user()->role == 1)
                    <!--<li class="collapsed">-->
                    <!--    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Applications" href="#">-->
                    <!--        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">-->
                    <!--            <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"/>-->
                    <!--            <path class="fill-secondary" d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>-->
                    <!--        </svg>-->
                    <!--        <span class="ms-2">Vehicle</span>-->
                    <!--        <span class="arrow fa fa-angle-right ms-auto text-end"></span>-->
                    <!--    </a>-->
        
                        <!-- Menu: Sub menu ul -->
                    <!--    <ul class="sub-menu collapse" id="menu-Applications">-->
                    <!--        {{-- <li><a class="ms-link" href="{{url('vehicle/add')}}">Add New</a></li> --}}-->
                    <!--        <li><a class="ms-link" href="{{url('vehicle/list')}}">View</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    

                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Super" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                                <path class="fill-secondary" d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
                            </svg>
                            <span class="ms-2">Admin</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
        
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-Super">
                            <li><a class="ms-link" href="{{url('admin/add')}}">Add</a></li>
                            <li><a class="ms-link" href="{{url('admin/list')}}">View</a></li>
                        </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-agent" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 1 224 0a128 128 0 1 1 0 256zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 36-146.9c2-8.1 9.8-13.4 17.9-11.3c70.1 17.6 121.9 81 121.9 156.4c0 17-13.8 30.7-30.7 30.7H285.5c-2.1 0-4-.4-5.8-1.1l.3 1.1H168l.3-1.1c-1.8 .7-3.8 1.1-5.8 1.1H30.7C13.8 512 0 498.2 0 481.3c0-75.5 51.9-138.9 121.9-156.4c8.1-2 15.9 3.3 17.9 11.3l36 146.9 33.4-123.9z"/></svg>
                            <span class="ms-2">Agent</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-agent">
                            <li><a class="ms-link" href="{{url('agent/list')}}">View</a></li>
                        </ul>
                    </li>
                    <!-- <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Customer" href="#">
                            <div xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                                <span class="arrow fa fa-user ms-auto text-end"></span>
                            </div>
                            <span class="ms-2">Customer</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        
                        {{-- Menu: Sub menu ul--}}
                        <ul class="sub-menu collapse" id="menu-Customer">
                            {{-- <li><a class="ms-link" href="{{url('agent/add')}}">Add New</a></li> --}}
                            <li><a class="ms-link" href="{{url('customer/list')}}">View</a></li>
                        </ul>
                    </li> -->
                @else
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Applications" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"/>
                                <path class="fill-secondary" d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            </svg>
                            <span class="ms-2">Vehicle</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
        
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-Applications">
                            <li><a class="ms-link" href="{{url('vehicle/add')}}">Add New</a></li>
                            <li><a class="ms-link" href="{{url('vehicle/list')}}">View</a></li>
                        </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link" href="{{url('file-record/view')}}">
                            <div xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                                <span class="arrow fa fa-file ms-auto text-end"></span>
                            </div>
                            <span class="ms-2">File Record</span>
                        </a>
                    </li>

                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#fileShared" href="#">
                            <div xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                                <span class="arrow fa fa-share-alt ms-auto text-end"></span>
                            </div>
                            <span class="ms-2">File Share</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="fileShared">
                            <li><a class="ms-link" href="{{url('file/shared')}}">Shared</a></li>
                            <li><a class="ms-link" href="{{url('file/received')}}">Received</a></li>
                        </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#letter" href="#">
                            <div xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                                <span class="arrow fa fa-file-text ms-auto text-end"></span>
                            </div>
                            <span class="ms-2">Letter</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="letter">
                            <li><a class="ms-link" href="{{url('letter/add')}}">Add</a></li>
                            <li><a class="ms-link" href="{{url('letter/view')}}">View</a></li>
                            <li><a class="ms-link" href="{{url('request-letter/list')}}">Requested Letter</a></li>
                        </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-agent" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 1 224 0a128 128 0 1 1 0 256zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 36-146.9c2-8.1 9.8-13.4 17.9-11.3c70.1 17.6 121.9 81 121.9 156.4c0 17-13.8 30.7-30.7 30.7H285.5c-2.1 0-4-.4-5.8-1.1l.3 1.1H168l.3-1.1c-1.8 .7-3.8 1.1-5.8 1.1H30.7C13.8 512 0 498.2 0 481.3c0-75.5 51.9-138.9 121.9-156.4c8.1-2 15.9 3.3 17.9 11.3l36 146.9 33.4-123.9z"/></svg>
                            <span class="ms-2">Agent</span>
                            <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                        </a>
                        
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-agent">
                            <li><a class="ms-link" href="{{url('agent/add')}}">Add New</a></li>
                            <li><a class="ms-link" href="{{url('agent/list')}}">View</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>