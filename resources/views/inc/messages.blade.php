@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger text-center">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{session('success')}}
        
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger text-center">
        {{session('error')}}
    </div>
@endif
