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
          <a href="{{ url('news/create') }}" class="btn rounded-pill btn-primary">
          Add News   
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
                      <th width="15%">Image</th>
                      <th width="45%">Title</th>
                      <th width="10%">Category</th>
                      <th width="10%">Status</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @if(count($news) > 0)
                      @foreach($news As $new)
                      <tr>
                        <td>{{ $count++ }}</td>
                        <td>
                          @if($new->cover_img)
                            <img src="{{ asset('main/img/news/'.$new->cover_img) }}" class="" height="70" width="70">
                          @endif
                        </td>
                        <td>{{ $new->title }}</td>
                        <td>
                            <span class="badge bg-secondary">{{ $new->category->name }}</span>
                        </td>
                        <td>
                          @if($new->status)
                            <span class="badge bg-success">Published</span>
                          @else
                            <span class="badge bg-danger">UnPublish</span>
                          @endif
                        </td>
                        <td>
                          <a href="{{ url('news/'.encrypt($new->id).'/edit') }}" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal{{ $new->id }}">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal{{ $new->id }}" tabindex="-1" aria-hidden="true">
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
                                    <a href="{{ url('news/'.encrypt($new->id).'/delete') }}" class="btn rounded-pill btn-primary">Delete</a>
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

@endsection

