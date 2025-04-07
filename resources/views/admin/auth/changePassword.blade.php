@extends('AdminLayout.index')

@section('content')
<style>
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
{{-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'> --}}
<link rel='stylesheet' href='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css'>
{{-- <link rel='stylesheet' href='https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css'> --}}

<div class="my-profile-con p-2 p-lg-0 d-lg-flex justify-content-center">
    <div class="col-lg-9 col-md-12 pb-5">
        <div id="list-item-2" class="card fieldset border border-muted my-5">
            <!-- form: Change Password -->
            <span class="fieldset-tile text-muted bg-body">Change Password</span>
            <div class="card">
                <div class="card-body">
                    <form action="/changePassword" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="password" class="form-control form-control-lg" name="current_password" placeholder="CurrentPassword" minlength="6" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="New Password" minlength="6" required>
                                </div>
                                <div>
                                    <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm New Password" minlength="6" required>
                                    <span class="text-muted small">Minimum 6 characters</span>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-lg btn-primary" type="submit">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection