@extends('layouts.app')

@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- Breadcrumb -->
      <div class="container d-flex justify-content-between flex-md-row">
        <div>
          <h5 class="py-3 mb-3 small"><span class="text-muted fw-light"><a href="{{ url('/home') }}">Dashboard</a> / </span> {{ $title }}</h5>
        </div>

      </div>
      <!-- Breadcrumb -->

      @include('inc.messages')

      <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table id="" class="table table-striped custom-table mb-0 small">
                    <tr class="bg-primary text-white text-center">
                        <th colspan="2">Company Details</th>
                    </tr>
                    <tr>
                        <th width="30%">Company Registration No.</th>
                        <td width="70%">{{ $investment->reg_no }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Export Registration No.</th>
                        <td width="70%">{{ $investment->exportreg_no }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Company Name</th>
                        <td width="70%">{{ $investment->investment_name }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Company Description.</th>
                        <td width="70%">{{ $investment->description }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Company Address.</th>
                        <td width="70%">{{ $investment->address }}</td>
                    </tr>
                    <tr class="bg-primary text-white text-center">
                        <th colspan="2">Contact Details</th>
                    </tr>
                    <tr>
                        <th width="30%">Focal Person</th>
                        <td width="70%">{{ $investment->focal_person }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Email Address</th>
                        <td width="70%">{{ $investment->email }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Phone Number</th>
                        <td width="70%">{{ $investment->phone }}</td>
                    </tr>
                    <tr class="bg-primary text-white text-center">
                        <th colspan="2">Investment Details</th>
                    </tr>
                    <tr>
                        <th width="30%">Number Of Job Created</th>
                        <td width="70%">{{ $investment->job_created }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Location</th>
                        <td width="70%">
                            <ul class="list-group">
                                @foreach($investment->location as $l)
                                    <li>{{ $l->local->lga }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th width="30%">Product and Service</th>
                        <td width="70%">
                            <ul class="list-group">
                                @foreach($investment->product as $p)
                                    <li>{{ $p->product->product_name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
@endsection



