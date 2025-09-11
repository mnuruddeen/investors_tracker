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
          Add Slider   
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
                      <th width="20%">Image</th>
                      <th width="20%">Title 1</th>
                      <th width="20%">Title 2</th>
                      <th width="20%">Title 3</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @if(count($sliders) > 0)
                      @foreach($sliders As $slider)
                      <tr>
                        <td>{{ $count++ }}</td>
                        <td>
                          <img src="{{ asset('main/img/slides/'.$slider->image) }}" class="img-thumbnail">
                        </td>
                        <td>{{ $slider->title_1 }}</td>
                        <td>{{ $slider->title_2 }}</td>
                        <td>{{ $slider->title_3 }}</td>
                        <td>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal{{ $slider->id }}">
                            <span class="tf-icons bx bx-pencil"></span>
                          </a>
                          <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal{{ $slider->id }}">
                            <span class="tf-icons bx bx-trash"></span>
                          </a>
                          <!-- Edit modal -->
                          <div class="modal fade" id="edit_modal{{ $slider->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit {{ $title }}</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form action="{{ url('sliders/'.$slider->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Change Image</label>
                                        <input type="file" name="slider" class="form-control" />
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Title 1 <span class="text-danger">*</span></label>
                                        <input type="text" name="title_1" value="{{ $slider->title_1 }}" class="form-control" required />
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Title 2</label>
                                        <input type="text" name="title_2" value="{{ $slider->title_2 }}" class="form-control" />
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-3">
                                        <label class="form-label">Title 3</label>
                                        <input type="text" name="title_3" value="{{ $slider->title_3 }}" class="form-control" />
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
                          <div class="modal fade" id="delete_modal{{ $slider->id }}" tabindex="-1" aria-hidden="true">
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
                                    <a href="{{ url('sliders/'.encrypt($slider->id).'/delete') }}" class="btn rounded-pill btn-primary">Delete</a>
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
          <strong>Note: </strong> Slider Image must be 1920 x 1080 dimenstion
        </p>
        <form action="{{ url('/sliders') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Image <span class="text-danger">*</span></label>
                <input type="file" name="slider" class="form-control" required />
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Title 1 <span class="text-danger">*</span></label>
                <input type="text" name="title_1" class="form-control" required />
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Title 2</label>
                <input type="text" name="title_2" class="form-control" />
              </div>
            </div>
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Title 3</label>
                <input type="text" name="title_3" class="form-control" />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-success">Upload slider</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@push('script')
  
@endpush
