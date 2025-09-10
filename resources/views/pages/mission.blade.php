@extends('layouts.main')
@section('content')

  <!-- Banner Start -->
    <div class="container-fluid py-5  mb-5">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary d-flex flex-column p-5" style="height: 300px;">
                        <div class="text-center text-white mb-3">
                            <span class="fa fa-book fa-2x"></span>
                        </div>
                        <h3 class="text-white mb-3 text-center">{{ $mission->title }}</h3>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <p class="mb-0 text-justify"> {{ $mission->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-info d-flex flex-column p-5" style="height: 300px;">
                        <div class="text-center text-white mb-3">
                            <span class="fa fa-eye fa-2x"></span>
                        </div>
                        <h3 class="text-white mb-3 text-center">{{ $vision->title }}</h3>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <p class="mb-0 text-justify"> {{ $vision->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Start -->

@endsection

