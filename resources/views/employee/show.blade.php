@extends('layouts.app')

@section('content')
  
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="{{ url('/home') }}">Dashboard</a> / <a href="{{ url('/employees') }}">Employee</a> / </span> {{ $title }}</h5>
        </div>
        <div class="text-right">
          <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal">
          Edit Employee   
          </button>
        </div>
      </div>
      <!-- Breadcrumb -->

      @include('inc.messages')

      <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-body">
                      <img src="{{ asset('assets/img/passports/'.$e->passport) }}" class="img-fluid" height="" width="">
                      <div class="text-center mt-2">
                        <strong>ID:</strong> {{ $e->psn }}
                      </div>
                      <div class="text-center mt-2">
                      <strong>STATUS:</strong>
                      @if($e->status)
                        <span class="badge bg-success">Active</span>
                      @else
                        <span class="badge bg-danger">Inactive</span>
                      @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-pills-justified-personal"
                          aria-controls="navs-pills-justified-personal"
                          aria-selected="true"
                        >
                          <i class="tf-icons bx bx-user"></i> Personal Details
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-pills-justified-bank"
                          aria-controls="navs-pills-justified-bank"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-money"></i> Bank Details
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-pills-justified-messages"
                          aria-controls="navs-pills-justified-messages"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-message-square"></i> Contact Details
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-pills-justified-document"
                          aria-controls="navs-pills-justified-document"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-file"></i> Documents
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <!-- Personal details start -->
                      <div class="tab-pane fade show active" id="navs-pills-justified-personal" role="tabpanel">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered small">
                            <tbody>
                              <tr>
                                <th width="25%">First Name</th>
                                <td width="25%">{{ strtoupper($e->first_name) }}</td>
                              </tr>
                              <tr>
                                <th width="25%">Middle Name</th>
                                <td width="25%">{{ strtoupper($e->middle_name) }}</td>
                              </tr>
                              <tr>
                                <th>Last Name</th>
                                <td>{{ strtoupper($e->last_name) }}</td>
                              </tr>
                              <tr>
                                <th>Gender</th>
                                <td>{{ strtoupper($e->gender) }}</td>
                              </tr>
                              <tr>
                                <th>Marital Status</th>
                                <td>{{ strtoupper($e->marital_status) }}</td>
                              </tr>
                              <tr>
                                <th>Date of Birth</th>
                                <td>{{ date('d-M-Y',strtotime($e->dob)) }}</td>
                              </tr>
                              <tr>
                                <th>Cadre</th>
                                <td>{{ strtoupper($e->cadre->cadre) }}</td>
                              </tr>
                              <tr>
                                <th>Rank</th>
                                <td>{{ strtoupper($e->rank->rank) }}</td>
                              </tr>
                              <tr>
                                <th>Grade Level</th>
                                <td>{{ strtoupper($e->rank->grade_level) }}</td>
                              </tr>
                              <tr>
                                <th>Rank</th>
                                <td>{{ strtoupper($e->step) }}</td>
                              </tr>
                              <tr>
                                <th>DOFA</th>
                                <td>{{ date('d-M-Y',strtotime($e->dofa)) }}</td>
                              </tr>
                              <tr>
                                <th>DOPA</th>
                                <td>{{ date('d-M-Y',strtotime($e->dopa)) }}</td>
                              </tr>
                              <tr>
                                <th>Duty Station</th>
                                <td>{{ strtoupper($e->station) }}</td>
                              </tr>
                              <tr>
                                <th>Nature of Employment</th>
                                <td>{{ strtoupper($e->nature->name) }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- Personal details end -->

                      <!-- Bank details start -->
                      <div class="tab-pane fade" id="navs-pills-justified-bank" role="tabpanel">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered small">
                            <tbody>
                              <tr>
                                <th width="25%">Bank Name</th>
                                <td width="25%">{{ strtoupper($e->bank->short_name) }}</td>
                              </tr>
                              <tr>
                                <th width="25%">Account No</th>
                                <td width="25%">{{ strtoupper($e->account_no) }}</td>
                              </tr>
                              <tr>
                                <th>BVN</th>
                                <td>{{ strtoupper($e->bvn) }}</td>
                              </tr>
                              <tr>
                                <th>Alert Phone</th>
                                <td>{{ strtoupper($e->phone) }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- Bank details end -->

                      <!-- Contact details start -->
                      <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered small">
                            <tbody>
                              <tr>
                                <th width="25%">Email Address</th>
                                <td width="25%">{{ strtolower($e->email) }}</td>
                                <th width="25%">Phone No</th>
                                <td width="25%">{{ strtoupper($e->phone) }}</td>
                              </tr>
                              <tr>
                                <th>Nationality</th>
                                <td>{{ strtoupper($e->nationality) }}</td>
                                <th>NIN</th>
                                <td>{{ strtoupper($e->nin) }}</td>
                              </tr>
                              <tr>
                                <th>State</th>
                                <td>{{ strtoupper($e->state->state) }}</td>
                                <th>LGA</th>
                                <td>{{ strtoupper($e->local->lga) }}</td>
                              </tr>
                              <tr>
                                <th>Home Address</th>
                                <td colspan="3">{{ strtoupper($e->address) }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- Contact details end -->

                      <!-- Documents start -->
                      <div class="tab-pane fade" id="navs-pills-justified-document" role="tabpanel">
                        <div class="text-end mb-3">
                          <button type="button" class="btn rounded-pill btn-success" data-bs-toggle="modal" data-bs-target="#add_document">
                          Upload Document   
                          </button>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered small">
                            <thead>
                              <tr>
                                <th width="5%">S/N</th>
                                <th width="80%">DOCUMENT</th>
                                <th width="15%">ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                            @php
                            $count = 1;
                            @endphp
                            @if(count($documents) > 0)
                              @foreach($documents As $document)
                              <tr>
                                <td>{{ $count++ }}</td>
                                <td>
                                  <a href="{{ asset('assets/documents/'.$document->document) }}"> 
                                    {{ strtoupper($document->document_type) }}
                                  </a>
                                </td>
                                <td>
                                  <a href="button" class="btn btn-xs p-3 rounded-pill btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal{{ $document->id }}">
                                    <span class="tf-icons bx bx-trash"></span>
                                  </a>
                                  <!-- Delete -->
                                  <div class="modal fade" id="delete_modal{{ $document->id }}" tabindex="-1" aria-hidden="true">
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
                                            <a href="{{ url('documents/'.encrypt($document->id).'/delete') }}" class="btn rounded-pill btn-primary">Delete</a>
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
                              <td colspan="3">
                                <p class="alert alert-danger text-center">No record found!</p>
                              </td>
                            </tr>
                            @endif
                            
                          </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- Documents end -->
                    </div>
                  </div>
                </div>
                </div>
              </div>
              <!-- Pills -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->

    <!-- Document Modal -->
    <div class="modal fade" id="add_document" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Upload Document</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form action="{{ url('/documents') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12 mb-3">
                  <input type="hidden" name="employee_id" value="{{ encrypt($e->id) }}">
                  <label class="form-label">Document Type <span class="text-danger">*</span></label>
                  <select name="document_type" class="form-control" required>
                    <option value="">--Select type--</option>
                    <option value="Curriculum Vitea">Curriculum Vitea (CV)</option>
                    <option value="Professional Certificate">Professional Certificate</option>
                    <option value="Other Document">Other Document</option>
                  </select>
                </div>

                <div class="col-md-12 mb-3">
                  <label class="form-label">Document <span class="text-danger">*</span></label>
                  <input type="file" name="document" class="form-control" required accept="application/pdf" />
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
    <!-- //End Document Modal -->


    <!-- Modal -->
    <div class="modal fade" id="edit_modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Edit Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ url('employees/'.$e->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">PSN <span class="text-danger">*</span></label>
                  <input type="text" name="psn" class="form-control" readonly />
                </div>
                <div class="col">
                  <label class="form-label">First Name <span class="text-danger">*</span></label>
                  <input type="text" name="first_name" value="{{ $e->first_name }}" class="form-control" required />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Middle Name</label>
                  <input type="text" name="middle_name" value="{{ $e->middle_name }}" class="form-control"/>
                </div>
                <div class="col">
                  <label class="form-label">Last Name <span class="text-danger">*</span></label>
                  <input type="text" name="last_name" value="{{ $e->last_name }}" class="form-control" required />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Gender <span class="text-danger">*</span></label>
                  <select class="form-control" name="gender" required>
                      <option value=""> --Select-- </option>
                      <option value="Male" {{ ($e->gender=='Male')?'selected':'' }}>Male</option>
                      <option value="Female" {{ ($e->gender=='Female')?'selected':'' }}>Female</option>
                  </select>
                </div>
                <div class="col">
                  <label class="form-label">Marital status <span class="text-danger">*</span></label>
                  <select class="form-control" name="marital_status" required>
                      <option value=""> --Select-- </option>
                      <option value="Married" {{ ($e->marital_status=='Married')?'selected':'' }}>Married</option>
                      <option value="Single" {{ ($e->marital_status=='Single')?'selected':'' }}>Single</option>
                      <option value="Divorce" {{ ($e->marital_status=='Divorce')?'selected':'' }}>Divorce</option>
                      <option value="Widow" {{ ($e->marital_status=='Widow')?'selected':'' }}>Widow</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                  <input type="date" name="dob" class="form-control" placeholder="Date of Birth" value="{{ $e->dob }}" required />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Email Address <span class="text-danger">*</span></label>
                  <input type="email" name="email" value="{{ $e->email }}" class="form-control" required />
                </div>
                <div class="col">
                  <label class="form-label">Phone No. <span class="text-danger">*</span></label>
                  <input type="text" name="phone" value="{{ $e->phone }}" class="form-control" required />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Nationality. <span class="text-danger">*</span></label>
                  <select class="form-control" name="nationality" required>
                    <option value="">--Select--</option>
                    <option value="nigerian" {{ ($e->nationality =='nigerian')?'selected':'' }}>Nigerian</option>
                    <option value="non-nigerian" {{ ($e->nationality =='non-nigerian')?'selected':'' }}>Non-Nigerian</option>
                  </select>
                </div>
                <div class="col">
                  <label class="form-label">National Identity No. (NIN) <span class="text-danger">*</span></label>
                  <input type="text" name="nin" value="{{ $e->nin }}" class="form-control" required />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label"> State Of Origin <span class="text-danger">*</span></label>
                  <select class="form-control" name="state" id="state" required>
                    <option value="">--Select--</option>
                    @foreach($states As $s)
                      <option value="{{ $s->id }}" {{ ($e->state_id==$s->id)?'selected':'' }}>{{ $s->state }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col">
                  <label class="form-label"> Local Government <span class="text-danger">*</span></label>
                  <select class="form-control" name="lga" id="lga" required>
                    <option value="{{ $e->local_id }}" selected>{{ $e->local->lga }}</option>
                    <option value="">--Select--</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Home Address <span class="text-danger">*</span></label>
                  <input type="text" name="address" value="{{ $e->address }}" class="form-control" required />
                </div>
                <div class="col">
                  <label class="form-label">Disability <span class="text-danger">*</span></label>
                  <input type="text" name="disability" value="{{ $e->disability }}" class="form-control" required />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Cadre <span class="text-danger">*</span></label>
                  <select class="form-control" name="cadre" id="cadre" required>
                    <option value="">--Select--</option>
                    @foreach($cadres As $c)
                      <option value="{{ $c->id }}">{{ $c->cadre }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col">
                  <label class="form-label">Rank <span class="text-danger">*</span></label>
                  <select class="form-control" name="rank" id="rank" required>
                      <option value="">--Select--</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Grade Level <span class="text-danger">*</span></label>
                  <input type="text" name="grade_level" class="form-control" required />
                </div>
                <div class="col">
                  <label class="form-label">Step <span class="text-danger">*</span></label>
                  <input type="text" name="step" value="{{ $e->step }}" class="form-control" required />
                </div>
              </div>            

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Date of first appointment (DOFA) <span class="text-danger">*</span></label>
                  <input type="date" name="dofa" value="{{ $e->dofa }}" class="form-control" required />
                </div>
                <div class="col">
                  <label class="form-label">Date of present appointment (DOPA) <span class="text-danger">*</span></label>
                  <input type="date" name="dopa" value="{{ $e->dopa }}" class="form-control" required />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Duty station <span class="text-danger">*</span></label>
                  <select class="form-control" name="duty_station" required>
                      <option value="">--Select--</option>
                      <option value="BS-PCAC" {{ ($e->station=='BS-PCAC')?'selected':'' }}>BS-PCAC</option>
                  </select>
                </div>
                <div class="col">
                  <label class="form-label">Nature of Employment <span class="text-danger">*</span></label>
                  <select class="form-control" name="nature" required>
                    <option value="">--Select--</option>
                    @foreach($natures As $n)
                      <option value="{{ $n->id }}" {{ ($e->employment_type==$n->id)?'selected':'' }}>{{ $n->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                  <select name="bank_name" class="form-control" required>
                    <option value="">--Select--</option>
                    @foreach($banks As $bank)
                      <option value="{{ $bank->id }}" {{ ($e->bank_id==$bank->id)?'selected':'' }}>{{ $bank->bank_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col">
                  <label class="form-label">Account No. <span class="text-danger">*</span></label>
                  <input type="text" name="account_no" value="{{ $e->account_no }}" class="form-control" required />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label class="form-label">Bank Verification No. (BVN) <span class="text-danger">*</span></label>
                  <input type="text" name="bvn" value="{{ $e->bvn }}" class="form-control" required />
                </div>
                <div class="col">
                  
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-success">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

@endsection

@push('script')
  <script>
    $(document).ready(function() {
        $('#state').on('change', function () {
            var id = $('#state').val();
            $('#lga').empty();
            $('#lga').append(`<option value="" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: '../../get_local/' + id,
                success: function (response) {
                    var response = JSON.parse(response);
                    //console.log(response);
                    $('#lga').empty();
                    $('#lga').append(`<option value="" disabled selected>--Select--</option>`);
                    response.forEach(element => {
                        $('#lga').append(`<option value="${element['id']}">${element['lga']}</option>`);
                    });
                }
            });
        });
        $('#cadre').on('change', function () {
            var id = $('#cadre').val();
            $('#rank').empty();
            $('#rank').append(`<option value="" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: '../../get_rank/' + id,
                success: function (response) {
                    var response = JSON.parse(response);
                    //console.log(response);
                    $('#rank').empty();
                    $('#rank').append(`<option value="" disabled selected>--Select--</option>`);
                    response.forEach(element => {
                        $('#rank').append(`<option value="${element['id']}">${element['rank']} - GL${element['grade_level']}</option>`);
                    });
                }
            });
        });
    });
  </script>
@endpush
