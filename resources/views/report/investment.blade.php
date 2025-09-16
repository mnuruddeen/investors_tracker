@extends('layouts.print')
@section('content')

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-2 mb-2 text-end">
                    <a href="javascript:history.go(-1)" class="btn btn-primary btn-sm d-print-none">Go Back <i class="bx bx-arrow-back"></i></a>
                    <button onclick="window.print()" class="btn btn-info btn-sm ml-3 d-print-none">Print Now <i class="bx bx-printer"></i></button>
                </div>
                <table width="100%" border="0" cellpadding="5" class="table-striped table-bordered mb-5 small">
                    <thead>
                    <tr>
                        <th width="5%">S/N</th>
                        <th width="30%">Investment</th>
                        <th width="10%">Sector</th>
                        <th width="10%">Products/Services</th>
                        <th width="5%">Investment Value</th>
                        <th width="20%">Location</th>
                        <th width="5%">Job Created</th>
                        <th width="5%">Phone No</th>
                        <th width="10%">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @if(count($investments) > 0)
                        @foreach($investments as $investment)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $investment->investment_name }}</td>
                                <td>
                                    <ul class="p-0 m-0" style="list-style-type:none;">
                                        @foreach($investment->product as $p)
                                            <li>{{ $p->product->sector->sector_name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="p-0 m-0" style="list-style-type:none;">
                                        @foreach($investment->product as $p)
                                            <li>{{ $p->product->product_name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ number_format($investment->investment_value,2) }}</td>
                                <td>
                                    <ul class="p-0 m-0" style="list-style-type:none;">
                                        @foreach($investment->location as $l)
                                            <li>{{ strtoupper($l->local->lga) }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $investment->job_created }}</td>
                                <td>{{ $investment->phone }}</td>
                                <td>{{ $investment->email }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">
                                <p class="alert alert-danger text-center">No record found!</p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

@endsection
