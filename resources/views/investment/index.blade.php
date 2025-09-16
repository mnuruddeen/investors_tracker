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
          Add New Investment
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
                      <th width="10%">Reg No</th>
                      <th width="25%">Company Name</th>
                      <th width="25%">Address</th>
                      <th width="10%">Phone</th>
                      <th width="15%">Email</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @if(count($investments) > 0)
                      @foreach($investments As $investment)
                      <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $investment->reg_no }}</td>
                        <td>{{ $investment->investment_name }}</td>
                        <td>{{ $investment->address }}</td>
                        <td>{{ $investment->phone }}</td>
                        <td>{{ $investment->email }}</td>
                        <td>
                            <a href="{{ url('investments/'.encrypt($investment->id)) }}" class="btn icon btn-info m-1">
                                <i class="bi bi-eye"></i>
                            </a>
                          <a href="#" class="btn  icon btn-primary m-1" data-bs-toggle="modal" data-bs-target="#edit_modal{{ $investment->id }}">
                            <i class="bi bi-pencil"></i>
                          </a>
                          <a href="#" class="btn icon btn-danger m-1" data-bs-toggle="modal" data-bs-target="#delete_modal{{ $investment->id }}">
                            <i class="bi bi-trash"></i>
                          </a>

                            <!-- Edit modal -->
                            <div class="modal fade" id="edit_modal{{ $investment->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document"> <!-- modal-lg for wider form -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit {{ $title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <form action="{{ url('investments/'.$investment->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row g-3">

                                                    <div class="col-md-6">
                                                        <label class="form-label">Business Registration No <span class="text-danger">*</span></label>
                                                        <input type="text" name="reg_no" class="form-control" value="{{ $investment->reg_no }}"  />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Export Registration No</label>
                                                        <input type="text" name="export_reg_no" class="form-control" value="{{ $investment->export_reg_no }}" />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" class="form-control" value="{{ $investment->investment_name }}"  />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Address <span class="text-danger">*</span></label>
                                                        <input type="text" name="address" class="form-control" value="{{ $investment->address }}"  />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">State <span class="text-danger">*</span></label>
                                                        <select name="state[]" class="form-control state-edit" multiple >
                                                            @foreach($states as $s)
                                                                <option value="{{ $s->id }}" {{ in_array($s->id, get_states($investment->location->pluck('local_id'))) ? 'selected' : '' }}>
                                                                    {{ $s->state }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">LGA <span class="text-danger">*</span></label>
                                                        <select name="lga[]" class="form-control lga-edit" multiple required>
                                                            @foreach($investment->location as $l)
                                                                <option value="{{ $l->id }}" selected>{{ $l->local->lga }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Focal Person <span class="text-danger">*</span></label>
                                                        <input type="text" name="focal_person" class="form-control" value="{{ $investment->focal_person }}"  />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" class="form-control" value="{{ $investment->email }}"  />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                        <input type="text" name="phone" class="form-control" value="{{ $investment->phone }}"  />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Number Of Job Created <span class="text-danger">*</span></label>
                                                        <input type="number" name="job_created" class="form-control" value="{{ $investment->job_created }}" required />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Sector <span class="text-danger">*</span></label>
                                                        <select  name="sector[]" class="form-control sector-edit" multiple required>
                                                            @foreach($sectors as $s)
                                                                <option value="{{ $s->id }}" {{ in_array($s->id, $investment->product->pluck('sector_id')->toArray()) ? 'selected' : '' }}>
                                                                    {{ $s->sector_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-label">Products/Services <span class="text-danger">*</span></label>
                                                        <select  name="product[]" class="form-control product-edit" multiple required>
                                                            @foreach($investment->product as $p)
                                                                <option value="{{ $p->product_id }}" selected>{{ $p->product->product_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label">Investment Value<span class="text-danger">*</span></label>
                                                        <input type="text" name="investment_value" class="form-control" value="{{ $investment->investment_value }}" required />
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                                        <textarea name="description" class="form-control" rows="3" >{{ $investment->description }}</textarea>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- //Edit modal -->
                          <!-- Delete -->
                          <div class="modal fade" id="delete_modal{{ $investment->id }}" tabindex="-1" aria-hidden="true">
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
                                    <a href="{{ url('investments/'.encrypt($investment->id).'/delete') }}" class="btn rounded-pill btn-primary">Delete</a>
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
                      <td colspan="8">
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
        <div class="modal-dialog modal-lg" role="document"> <!-- modal-lg gives more width -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ url('/investments') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3"> <!-- g-3 adds spacing between cols -->

                            <div class="col-md-6">
                                <label class="form-label">Business Registration No <span class="text-danger">*</span></label>
                                <input type="text" name="reg_no" class="form-control" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Export Registration No <span class="text-danger"></span></label>
                                <input type="text" name="export_reg_no" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">State <span class="text-danger">*</span></label>
                                <select type="text" id="state" name="state[]" class="form-control" multiple required>
                                    <option value="">--Select--</option>
                                    @foreach($states as $s)
                                        <option value="{{ $s->id }}">{{ $s->state }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">LGA <span class="text-danger">*</span></label>
                                <select type="text" id="lga" name="lga[]" class="form-control" multiple required>
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Focal Person <span class="text-danger">*</span></label>
                                <input type="text" name="focal_person" class="form-control" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" required />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Number Of Job Created <span class="text-danger">*</span></label>
                                <input type="text" name="job_created" class="form-control" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Sector <span class="text-danger">*</span></label>
                                <select type="text" id="sector" name="sector[]" class="form-control" multiple required>
                                    <option value="">--Select--</option>
                                    @foreach($sectors as $s)
                                        <option value="{{ $s->id }}">{{ $s->sector_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Products/Services <span class="text-danger">*</span></label>
                                <select type="text" id="product" name="product[]" class="form-control" multiple required>
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Business Description" required></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            // State change handler
            $('#state').on('change', function () {
                var stateId = $(this).val();
                if (!stateId) return;
                $('#lga').empty().append('<option value="" disabled selected>Processing...</option>');
                $.ajax({
                    url: '/get_lga',
                    method: 'POST',
                    data: {
                        'state_id': $('#state').val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        //$('#lga').empty().append('<option value="">All</option>');
                        $.each(data, function(index, element) {
                            $('#lga').append(`<option value="${element.id}">${element.lga}</option>`);
                        });
                    },
                    error: function(xhr) {
                        console.error('Error loading ranks:', xhr.responseText);
                        $('#lga').empty().append('<option value="">Error loading options</option>');
                    }
                });
            });

            // Sector change handler
            $('#sector').on('change', function () {
                var sectorId = $(this).val();
                if (!sectorId) return;
                $('#product').empty().append('<option value="" disabled selected>Processing...</option>');
                $.ajax({
                    url: '/get_product',
                    method: 'POST',
                    data: {
                        'sector_id': $('#sector').val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $.each(data, function(index, element) {
                            $('#product').append(`<option value="${element.id}">${element.product_name}</option>`);
                        });
                    },
                    error: function(xhr) {
                        console.error('Error loading ranks:', xhr.responseText);
                        $('#product').empty().append('<option value="">Error loading options</option>');
                    }
                });
            });

            //edit triger
            // State change handler
            // State change handler (edit)
            $(document).on('change', '.state-edit', function () {
                var $this = $(this);
                var stateId = $this.val();
                var target = $this.closest('.modal').find('.lga-edit');

                if (!stateId) return;
                target.empty().append('<option disabled selected>Processing...</option>');

                $.ajax({
                    url: '/get_lga',
                    method: 'POST',
                    data: { state_id: stateId },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        target.empty();
                        $.each(data, function(index, element) {
                            target.append(`<option value="${element.id}">${element.lga}</option>`);
                        });
                    },
                    error: function(xhr) {
                        console.error('Error loading LGAs:', xhr.responseText);
                        target.empty().append('<option>Error loading options</option>');
                    }
                });
            });

            // Sector change handler (edit)
            $(document).on('change', '.sector-edit', function () {
                var $this = $(this);
                var sectorId = $this.val();
                var target = $this.closest('.modal').find('.product-edit');

                if (!sectorId) return;
                target.empty().append('<option disabled selected>Processing...</option>');

                $.ajax({
                    url: '/get_product',
                    method: 'POST',
                    data: { sector_id: sectorId },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        target.empty();
                        $.each(data, function(index, element) {
                            target.append(`<option value="${element.id}">${element.product_name}</option>`);
                        });
                    },
                    error: function(xhr) {
                        console.error('Error loading products:', xhr.responseText);
                        target.empty().append('<option>Error loading options</option>');
                    }
                });
            });
        });
    </script>
@endpush


