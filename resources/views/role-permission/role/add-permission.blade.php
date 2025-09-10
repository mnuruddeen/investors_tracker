@extends('layouts.app')

@section('content')
  
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="{{ url('/home') }}">Dashboard</a> / <a href="{{ url('/roles') }}">Roles</a> / </span> {{ $title }}</h5>
        </div>
      </div>
      <!-- Breadcrumb -->

      @include('inc.messages')

      <div class="row">
        <div class="col-xl">
        
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Role: {{ $role->name }}</h5>

                    <small class="text-muted float-end">
                        <div class="form-check">
                            <label class="form-check-label">
                                CHECK ALL
                                <input type="checkbox" id="check-all" class="form-check-input" value="">
                            </label>
                        </div>
                    </small>
                </div>

                <div class="divider divider-dashed">
                    <h3 class="divider-text text-success">PERMISSIONS LIST</h3>
                </div>

                <div class="card-body p-4">
                    <form action="{{ url('roles/'.encrypt($role->id).'/add_permission_to_role') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            
                            @hasrole('super-admin')
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-3 form-check mb-3">
                                        <label>
                                            <input type="checkbox" 
                                            name="permission[]" 
                                            class="form-check-input check-all" 
                                            value="{{ $permission->name }}" 
                                            {{ in_array($permission->id, $role_permissions) ? 'checked' : '' }}>
                                         
                                            {{ strtoupper($permission->name) }}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                            @endhasrole
                        </div>
                        <div class="submit-section text-center">
                            <button class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
      </div>
    </div>
    <!-- / Content -->
@endsection

@push('script')
    <script>
        $(document).ready(function(){
            $('#check-all').on('change',function (){
                if($('#check-all')[0].checked){
                    $('.check-all').prop('checked', true);
                }else{
                    $('.check-all').prop('checked', false);
                }
            });
        });
    </script>
@endpush







