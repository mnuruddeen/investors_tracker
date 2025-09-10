@extends('layouts.app')
@section('content')

<!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="{{ url('/home') }}">Dashboard</a> / <a href="{{ url('/students') }}">Students</a> /</span> {{ $title }}</h5>
        </div>
      </div>
      <!-- Breadcrumb -->
      
      @include('inc.messages')

      <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped custom-table mb-0 small">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th width="15%">Reg No</th>
                      <th width="55%">FullName</th>
                      <th width="10%">Level</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @if(count($students) > 0)
                      @foreach($students As $s)
                      <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ strtoupper($s->reg_no) }}</td>
                        <td>{{ strtoupper($s->fullname) }}</td>
                        <td>{{ strtoupper($s->current_level) }}</td>
                        <td>
                          
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger disabled" data-bs-toggle="modal" data-bs-target="#delete_modal{{ $s->id }}">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
 
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal{{ $s->id }}" tabindex="-1" aria-hidden="true">
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
                                    <a href="{{ url('students/'.encrypt($s->id).'/delete') }}" class="btn rounded-pill btn-primary">Delete</a>
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
@endsection

