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
	        <form action="{{ url('certificates/'.$CofOs->id) }}" method="post" enctype="multipart/form-data">
	        @csrf
	        @method('PUT')
		        <div class="form-group mb-4">
		        	<label>Date of Recording: <span class="text-danger">*</span></label>
		        	<input type="date" name="date_of_recording" value="{{ $CofOs->date_of_recording }}" class="form-control" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Owner Type: <span class="text-danger">*</span></label>
		        	<select name="owner_type" class="form-control" required>
		        		<option value="">--Choose Owner Type--</option>
		        		@foreach($owner_types as $owner_type)
		        			<option value="{{ $owner_type->id }}" {{ ($CofOs->owner_type_id == $owner_type->id) ? 'selected' : '' }}>{{ strtoupper($owner_type->name) }}</option>
		        		@endforeach
		        	</select>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Owner(s) Name: <span class="text-danger">*</span></label>
		        	<input type="text" name="owner_name" class="form-control" value="{{ strtoupper($CofOs->owner_name) }}" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Owner Gender: <span class="text-danger">*</span></label>
		        	<select name="owner_gender" class="form-control" required>
		        		<option value="">--Choose Gender--</option>
		        		<option value="Male" {{ ($CofOs->owner_gender == "Male")?'selected':'' }}>Male</option>
		        		<option value="Female" {{ ($CofOs->owner_gender == "Female")?'selected':'' }}>Female</option>
		        		<option value="Other" {{ ($CofOs->owner_gender == "Other")?'selected':'' }}>Other</option>
		        	</select>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Ownership Type: <span class="text-danger">*</span></label>
		        	<select name="ownership_type" class="form-control" required>
		        		<option value="">--Choose Ownership Type--</option>
		        		@foreach($ownership_types as $ownership_type)
		        			<option value="{{ $ownership_type->id }}" {{ ($CofOs->ownership_type_id == $ownership_type->id) ? 'selected' : '' }}>{{ strtoupper($ownership_type->name) }}</option>
		        		@endforeach
		        	</select>
		        </div>

		        <div class="form-group mb-4">
		        	<label>CofO Issuance date: <span class="text-danger">*</span></label>
		        	<input type="date" name="date_of_issuance" value="{{ $CofOs->date_of_issuance }}" class="form-control" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>CofO Registration date: <span class="text-danger">*</span></label>
		        	<input type="date" name="date_of_registration" value="{{ $CofOs->date_of_registration }}" class="form-control" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>CofO Reference number: <span class="text-danger">*</span></label>
		        	<input type="text" name="reference_no" value="{{ $CofOs->reference_no }}" class="form-control" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>CofO/Documents Picture:</label>
		        	<input type="file" name="document" class="form-control" accept="image/*">
		        </div>

		        <div class="form-group mb-4">
		        	<label>Enumerator Name: <span class="text-danger">*</span></label>
		        	<input type="text" name="enumerator_name" value="{{ strtoupper($CofOs->user->name) }}" class="form-control disabled"  readonly disabled>
		        </div>

		        <div class="form-group mb-4 text-center">
		        	<button type="submit" class="btn rounded-pill btn-primary">Save Changes</button>
		        </div>
	      	</form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->

@endsection

@push('script')

@endpush