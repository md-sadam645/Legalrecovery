@extends('AdminLayout.index')
<style>
    /*.page-footer*/
    /*{*/
    /*    position:fixed;*/
    /*    bottom: 0px;*/
    /*}*/
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@section('content')


<div class="container mb-4">
    <div class="row g-3 clearfix row-deck">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header py-3 bg-transparent border-bottom-0">
                    <h6 class="card-title mb-0">{{$title}}</h6>
                    <i class="fa fa-info-circle mb-0" style="font-size:25px;cursor: pointer;" title="All Shortcut Name" data-bs-toggle="modal" data-bs-target="#shortcutName"></i>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{url('letterSave')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" required />
                                @if($errors->has('name'))
                                    <div class="form-error text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="col-12 mb-4">
                                <label for="address">Address Of The Letter <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" id="address" required />
                                @if($errors->has('address'))
                                    <div class="form-error text-danger">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
                            <div class="col-6 mb-4">
                                <label for="address">Logo</label>
                                <input type="file" name="logo" class="form-control" id="logo" />
                                @if($errors->has('log'))
                                    <div class="form-error text-danger">{{ $errors->first('logo') }}</div>
                                @endif
                            </div>
                            <div class="col-6 mb-4">
                                <label for="address">Seal</label>
                                <input type="file" name="seal" class="form-control" id="seal" />
                                @if($errors->has('seal'))
                                    <div class="form-error text-danger">{{ $errors->first('seal') }}</div>
                                @endif
                            </div>
                            <div class="col-12 mb-3">
                                <label for="content">Content <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="content" id="content" style="height: 350px;">
                                </textarea>
                                @if($errors->has('content'))
                                    <div class="form-error text-danger">{{ $errors->first('content') }}</div>
                                @endif
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Add Letter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- All Shortcut Name Modal -->
  <div class="modal fade" id="shortcutName" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">All Shortcut Name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul>
                <li>customer_name</li>
                <li>loan_no</li>
                <li>registration_no</li>
                <li>vehicle_make</li>
                <li>executive_email</li>
                <li>police_station</li>
                <li>_city_</li>
                <li>_pincode_</li>
                <li>_address_</li>
                <li>_date_</li>
                <li>chasis_no</li>
                <li>engine_no</li>
                <li>_logo_</li>
                <li>_seal_</li>
            </ul>
        </div>
      </div>
    </div>
  </div>
    
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection

