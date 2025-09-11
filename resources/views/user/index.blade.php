@extends('layouts.app')

@section('content')
  
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="{{ url('/home') }}">Dashboard</a> / </span> {{ $title }}</h5>
        </div>
        <div class="text-right">
          <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal">
          Add User   
          </button>
        </div>
      </div>
      <!-- Breadcrumb -->

      @include('inc.messages')

      <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table id="table1" class="table table-striped custom-table mb-0 small">
                  <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="30%">Name</th>
                        <th width="35%">Email</th>
                        <th width="15%">Roles</th>
                        <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @if(count($users) > 0)
                      @foreach($users As $user)
                      <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ strtoupper($user->name) }}</td>
                        <td>{{ strtolower($user->email) }}</td>
                        <td>
                           @if (!empty($user->getRoleNames()))
                               @foreach ($user->getRoleNames() as $rolename)
                                   <label class="badge bg-info text-white mx-1">{{ ucwords($rolename) }}</label>
                               @endforeach
                           @endif 
                        </td>
                        <td>
                          <a href="button" id="edit_modal_{{$user->id}}" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal{{ $user->id }}">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>

                          @can('suspend user')
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal{{ $user->id }}">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          @endcan

                          <!-- Edit modal -->
                          <div class="modal fade" id="edit_modal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit Permission</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form action="{{ url('users/'.$user->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input class="form-control" value="{{ strtoupper($user->name) }}" type="text" name="name" required>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                        <input class="form-control" value="{{ strtolower($user->email) }}" type="text" name="email" required>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Role <span class="text-danger">*</span></label>
                                        <select name="roles[]" class="select2 form-control w-100" multiple required>
                                            <option value="">--Choose Role--</option>
                                            @foreach($roles as $role)
                                            <option 
                                            <?php
                                                $user_roles = $user->roles->pluck('name','name')->all();
                                            ?>
                                            {{ in_array($role, $user_roles) ? 'selected':'' }}
                                            value="{{ $role }}"
                                            >
                                                {{ ucwords($role) }}
                                            </option>
                                        @endforeach
                                        </select>
                                      </div>
                                    </div>                                    
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                      Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- //Edit modal -->
                          @can('delete user')
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header text-center d-inline">
                                  <h5 class="modal-title">Delete Confirm</h5>
                                </div>
                                
                                <div class="text-center pt-2 pb-4">
                                  <div>
                                    <p class="mb-3">Are you sure want to delete?</p>
                                  </div>
                                  <div>
                                    <button type="button" class="btn rounded-pill btn-secondary" data-bs-dismiss="modal">
                                      Cancel
                                    </button>
                                    <a href="{{ url('users/'.encrypt($user->id).'/delete') }}" class="btn rounded-pill btn-primary">Delete</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- //Delete -->
                          @endcan
                        </td>
                      </tr>
                      @endforeach
                    @else
                    <tr>
                      <td colspan="5">
                        <p class="alert alert-danger text-center">No record found!</p>
                      </td>
                    </tr>
                    @endif
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->

  <!-- Modal -->
  <div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="{{ url('/users') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="email" value="{{ old('email') }}" required>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" value="{{ old('') }}" required>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password_confirmation" value="{{ old('') }}" required>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Role <span class="text-danger">*</span></label>
                <select name="roles[]" class="select2 form-control w-100" multiple required>
                    <option value="">--Choose Role--</option>
                    @foreach($roles as $role)
                        <option value="{{ $role }}">{{ strtoupper($role) }}</option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <script>
      // Initialize Select2 on modal show
      $('#add_modal').on('shown.bs.modal', function () {
          $('.select2').select2({
              dropdownParent: $('#add_modal')  // Ensure Select2 dropdown is attached to the modal
          });
          
      });

      
      $('#edit_modal').on('shown.bs.modal', function () {
          $('.select2').select2({
              dropdownParent: $('#edit_modal')  // Ensure Select2 dropdown is attached to the modal
          });
      });
  </script>
@endpush
