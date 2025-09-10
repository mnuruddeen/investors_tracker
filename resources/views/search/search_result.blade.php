@extends('layouts.main')
@section('content')

    <div class="container-fluid bg-primary bg-header" style="margin-bottom: 10px;">
        <div class="row py-3">
            <div class="col-12 mt-lg-5 text-center">
                <h5 class="display-5 text-white animated zoomIn">{{ $title }}</h5>
            </div>
        </div>
    </div>

    <!-- Blog Start -->
    <div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12">
                    <!-- Blog Detail Start -->
                    <div class="table-responsive">
                        @if($results->isEmpty())
                            <p class="alert alert-danger text-center">
                                No records found!
                                <span class="d-block py-2">
                                    <a class="btn btn-primary" href="javascript:history.go(-1)">Go Back</a>
                                </span>
                            </p>
                        @else
                        <table class="table table-hover table-bordered table-striped small">
                            <thead>
                                <tr>
                                   <th width="5%">SN</th> 
                                   <th width="15%">REFERENCE</th> 
                                   <th width="65%">OWNER NAME</th> 
                                   <th width="15%">ACTION</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($results As $row)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ strtoupper($row->reference_no) }}</td>
                                    <td>{{ strtoupper($row->owner_name) }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#approval_modal{{$row->id}}"><i class="fa fa-pencil m-r-5"></i> View</a>
                                        <div id="approval_modal{{$row->id}}" class="modal custom-modal fade" role="dialog">
                                            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{ strtoupper($row->owner_name) }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body p-3">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Date of Recording:</th>
                                                                <td>{{ date('d M, Y.', strtotime($row->date_of_recording)) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Owner type:</th>
                                                                <td>{{ $row->owner_type->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Owner(s) Name:</th>
                                                                <td>{{ strtoupper($row->owner_name) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Owner Gender:</th>
                                                                <td>{{ strtoupper($row->owner_gender) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Specify:</th>
                                                                <td>{{ $row->specify }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Ownership type:</th>
                                                                <td>{{ $row->ownership_type->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>CofO Issuance date:</th>
                                                                <td>{{ date('d M, Y.', strtotime($row->date_of_issuance)) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>CofO Registration date:</th>
                                                                <td>{{ date('d M, Y.', strtotime($row->date_of_registration)) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>CofO Reference Number:</th>
                                                                <td>{{ strtoupper($row->reference_no) }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif                   
                    </div>
                    <!-- Blog Detail End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection