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
                      <th width="15%">PSN</th>
                      <th width="30%">FULLNAME</th>
                      <th width="5%">GENDER</th>
                      <th width="20%">CADRE</th>
                      <th width="20%">RANK</th>
                      <th width="5%">GL</th>
                      <th width="5%">STEP</th>
                    </tr>
                </thead>
                <tbody>
                @php
                $count = 1;
                @endphp
                @if(count($employees) > 0)
                  @foreach($employees As $employee)
                  <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $employee->psn }}</td>
                    <td> 
                        {{ strtoupper($employee->full_name) }}
                    </td>
                    <td>{{ strtoupper($employee->gender) }}</td>
                    <td>{{ strtoupper($employee->cadre->cadre) }}</td>
                    <td>{{ strtoupper($employee->rank->rank) }}</td>
                    <td>{{ strtoupper($employee->rank->grade_level) }}</td>
                    <td>{{ strtoupper($employee->step) }}</td>
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
<!-- /Page Content -->

@endsection
