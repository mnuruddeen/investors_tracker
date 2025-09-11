@extends('layouts.app')
@section('content')

<!-- Content -->
    <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="{{ url('/home') }}">Dashboard</a> / </span> {{ $title }}</h5>
        </div>
      </div>
      <!-- Breadcrumb -->

    <div class="container-xxl flex-grow-1 container-p-y">
      

      <div class="row mt-5">
        <div class="col-xl">
          <div class="col-md-5 card m-auto shadow-lg p-4">
            <h4 class="mb-5 text-center">Change Password? 🔒</h4>
            @include('inc.messages')
            <form  action="{{ url('change-password') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label>Current Password <span class="text-danger">*</span></label>
                            <input type="password" name="current-password" class="form-control" placeholder="Current Password">
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label>New Password <span class="text-danger">*</span></label>
                            <input type="password" name="new-password" class="form-control" placeholder="New Password">
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label>Confirm New Password <span class="text-danger">*</span></label>
                            <input type="password" name="new-password_confirmation" class="form-control" placeholder="Confirm New Password">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <button class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
@endsection

