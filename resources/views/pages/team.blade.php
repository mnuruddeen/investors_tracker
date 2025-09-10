@extends('layouts.main')
@section('content')

    <!-- Team Start -->
    <div class="container-fluid py-5 mb-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title bg-light rounded h-100 p-5">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Managemnts Team</h5>
                        <h1 class="display-6 mb-4">OUR TEAM AND EXPERTS</h1>
                    </div>
                </div>
                
                @if(count($teams) > 0)
                    <?php $delay = "0.3";  ?>
                    @foreach($teams as $team)
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="{{ $delay += 0.3 }}s">
                        <div class="team-item">
                            <div class="team-img position-relative rounded-top" style="z-index: 1;">
                                <img class="img-fluid rounded-top w-100" src="{{ asset('main/img/teams/'.$team->image) }}" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                    <a class="btn btn-primary btn-square m-1" href="{{ $team->twitter }}" target="_blank"><i class="fab fa-twitter fw-normal"></i></a>
                                    <a class="btn btn-primary btn-square m-1" href="{{ $team->facebook }}" target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-primary btn-square m-1" href="{{ $team->instagram }}"><i class="fab fa-instagram fw-normal"></i></a>
                                </div>
                            </div>
                            <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                                <h4 class="mb-2">{{ $team->name }}</h4>
                                <p class="text-primary mb-0">{{ $team->rank }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection

