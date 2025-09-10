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
          <a href="{{ url('certificates/create') }}" class="btn rounded-pill btn-primary">
          Add Certificate   
          </a>
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
                      <th width="15%">Owner Type</th>
                      <th width="15%">Owners Name</th>
                      <th width="10%">Ownership Type</th>
                      <th width="10%">Issuance Date</th>
                      <th width="10%">Registration Date</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @if(count($certificates) > 0)
                      @foreach($certificates As $cofos)
                      <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $cofos->owner_type->name }}</td>
                        <td>{{ strtoupper($cofos->owner_name) }}</td>
                        <td>{{ $cofos->ownership_type->name }}</td>
                        <td>{{ date('d-m-Y',strtotime($cofos->date_of_issuance)) }}</td>
                        <td>{{ date('d-m-Y',strtotime($cofos->date_of_registration)) }}</td>
                        <td>
                          @if($cofos->document)

                            <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-secondary" data-bs-toggle="modal" data-bs-target="#view_document_modal{{ $cofos->id }}">
                              <span class="tf-icons bx bx-file"></span>
                            </a>
                            <div class="modal fade" id="view_document_modal{{ $cofos->id }}" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header text-center d-inline">
                                    <h5 class="modal-title">Supporting Documents</h5>
                                  </div>
                                  
                                  <div class="text-center pt-2 pb-4">
                                    
                                      <iframe src="{{ asset('main/certificates/'.$cofos->document) }}" width="100%" height="100%" style="border: none;">
                                        <img src="{{ asset('main/certificates/'.$cofos->document) }}" class="img-fluid" height="100%" width="100%">
                                          Your browser does not support iframes.
                                      </iframe>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          @endif
                          <a href="{{ url('certificates/'.encrypt($cofos->id).'/edit') }}" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal{{ $cofos->id }}">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal{{ $cofos->id }}" tabindex="-1" aria-hidden="true">
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
                                    <a href="{{ url('certificates/'.encrypt($cofos->id).'/delete') }}" class="btn rounded-pill btn-primary">Delete</a>
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
                      <td colspan="7">
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

