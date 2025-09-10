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
	        <form action="{{ url('news/'.$news->id) }}" method="post" enctype="multipart/form-data">
	        @csrf
	        @method('PUT')
		        <div class="form-group mb-4">
		        	<label>Title <span class="text-danger">*</span></label>
		        	<input type="text" name="title" value="{{ $news->title }}" class="form-control" required>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Category <span class="text-danger">*</span></label>
		        	<select name="category" class="form-control" required>
		        		<option value="">--Choose category--</option>
		        		@foreach($categories as $cat)
		        			<option value="{{ $cat->id }}" {{ ($news->category_id == $cat->id) ? 'selected' : '' }}>{{ strtoupper($cat->name) }}</option>
		        		@endforeach
		        	</select>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Body <span class="text-danger">*</span></label>
		        	<textarea name="body" id="content" class="form-control" rows="5" required>{{ $news->body }}</textarea>
		        </div>

		        <div class="form-group mb-4">
		        	<label>Cover Image</label>
		        	<input type="file" name="document" class="form-control" accept="image/*">
		        </div>

		        <div class="form-group mb-4 text-center">
		        	<button type="submit" class="btn rounded-pill btn-primary">Publish</button>
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