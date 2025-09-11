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
          Add Member   
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
                      <th width="15%">Image</th>
                      <th width="25%">Name</th>
                      <th width="25%">Rank</th>
                      <th width="10%">Status</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @if(count($teams) > 0)
                      @foreach($teams As $team)
                      <tr>
                        <td>{{ $count++ }}</td>
                        <td>
                          @if($team->image)
                          <img src="{{ asset('main/img/teams/'.$team->image) }}" class="" height="70" width="70">
                          @endif
                        </td>
                        <td>{{ $team->name }}</td>
                        <td>{{ strtoupper($team->rank) }}</td>
                        <td>
                          @if($team->status)
                            <span class="badge bg-success">Active</span>
                          @else
                            <span class="badge bg-danger">Inactive</span>
                          @endif
                        </td>
                        <td>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal{{ $team->id }}">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal{{ $team->id }}">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <!-- Edit modal -->
                          <div class="modal fade" id="edit_modal{{ $team->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit {{ $title }}</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form action="{{ url('teams/'.$team->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Change Image</label>
                                        <input type="file" name="document" class="form-control"/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ $team->name }}" class="form-control" required/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Rank <span class="text-danger">*</span></label>
                                        <input type="text" name="rank" value="{{ $team->rank }}" class="form-control" required/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Facebook </label>
                                        <input type="text" name="facebook" value="{{ $team->facebook }}" class="form-control"/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Twitter </label>
                                        <input type="text" name="twitter" value="{{ $team->twitter }}" class="form-control"/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Instagram </label>
                                        <input type="text" name="instagram" value="{{ $team->instagram }}" class="form-control"/>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">LinkedIn </label>
                                        <input type="text" name="linkedin" value="{{ $team->linkedin }}" class="form-control"/>
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
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal{{ $team->id }}" tabindex="-1" aria-hidden="true">
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
                                    <a href="{{ url('teams/'.encrypt($team->id).'/delete') }}" class="btn rounded-pill btn-primary">Delete</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- //Delete -->
                        </td>
                      </tr>
                      @endforeach
                    @else
                    <tr>
                      <td colspan="6">
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
          <h5 class="modal-title" id="exampleModalLabel1">Add {{ $title }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <p class="m-4 alert alert-warning text-center dashed">
          <strong>Note: </strong> Image must be 500 x 450 dimenstion
        </p>
        <form action="{{ url('/teams') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="document" class="form-control" required/>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" required />
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Rank <span class="text-danger">*</span></label>
                <input type="text" name="rank" class="form-control" required/>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Facebook </label>
                <input type="text" name="facebook" class="form-control"/>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Twitter </label>
                <input type="text" name="twitter" class="form-control"/>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Instagram </label>
                <input type="text" name="instagram" class="form-control"/>
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">LinkedIn </label>
                <input type="text" name="linkedin" class="form-control"/>
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
  
@endpush
