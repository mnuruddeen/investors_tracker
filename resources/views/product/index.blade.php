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
          Add Product/Service
          </button>
        </div>
      </div>
      <!-- Breadcrumb -->

      @include('inc.messages')

      <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-body">
              <div class="..">
                <table id="table1" class="table table-striped custom-table mb-0 small">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th width="30%">Sector</th>
                      <th width="50%">Name</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @if(count($products) > 0)
                      @foreach($products As $product)
                      <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $product->sector->sector_name }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>
                          <a href="#" class="btn icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal{{ $product->id }}">
                            <i class="bi bi-pencil"></i>
                          </a>
                          <a href="#" class="btn icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal{{ $product->id }}">
                            <i class="bi bi-trash"></i>
                          </a>

                          <!-- Edit modal -->
                          <div class="modal fade" id="edit_modal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel1">Edit {{ $title }}</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="{{ url('products/'.$product->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <div class="modal-body">
                                      <div class="row">
                                          <div class="col mb-3">
                                              <label class="form-label">Sector <span class="text-danger">*</span></label>
                                              <select  name="sector" class="form-control" required>
                                                  <option value="">--Select--</option>
                                                  @foreach($sectors as $s)
                                                      <option value="{{ $s->id }}" {{ ($s->id == $product->sector_id)?"selected":"" }}>{{ $s->sector_name }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col mb-3">
                                              <label class="form-label">Product/Service Name <span class="text-danger">*</span></label>
                                              <input type="text" name="name" class="form-control" value="{{ $product->product_name }}" required />
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
                          <div class="modal fade" id="delete_modal{{ $product->id }}" tabindex="-1" aria-hidden="true">
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
                                    <a href="{{ url('products/'.encrypt($product->id).'/delete') }}" class="btn rounded-pill btn-primary">Delete</a>
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

  <!-- Modal -->
  <div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Add {{ $title }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ url('/products') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label class="form-label">Sector <span class="text-danger">*</span></label>
                  <select  name="sector" class="form-control" required>
                      <option value="">--Select--</option>
                      @foreach($sectors as $s)
                      <option value="{{ $s->id }}">{{ $s->sector_name }}</option>
                      @endforeach
                  </select>
              </div>
            </div>
              <div class="row">
                  <div class="col mb-3">
                      <label class="form-label">Product/Service Name <span class="text-danger">*</span></label>
                      <input type="text" name="name" class="form-control" required />
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-success">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

