@extends('layouts.main')
@section('content')

	<div class="container-fluid bg-primary bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 mt-lg-5 text-center">
                <h4 class="text-white animated zoomIn">{{ $news->title }}</h4>
            </div>
        </div>
    </div>

	<!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="{{ asset('main/img/news/'.$news->cover_img) }}" alt="">
                        <h1 class="mb-4">{{ $news->title }}</h1>
                        
                        {!! $news->body !!}
                        
                    </div>
                    <!-- Blog Detail End -->
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
    
                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Recent News</h3>
                        </div>
                        @foreach($recent_news as $recent)
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{ asset('main/img/news/'.$recent->cover_img) }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="{{ url('latest-news/'.encrypt($recent->id)) }}" class="fw-semi-bold d-flex bg-light px-2 py-2 mb-0 w-100 small">{{ $recent->title }}
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- Recent Post End -->
    
    
                    <!-- Plain Text Start -->
                    <div class="wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Plain Text</h3>
                        </div>
                        <div class="bg-light text-center" style="padding: 30px;">
                            <p>Vero sea et accusam justo dolor accusam lorem consetetur, dolores sit amet sit dolor clita kasd justo, diam accusam no sea ut tempor magna takimata, amet sit et diam dolor ipsum amet diam</p>
                            <a href="" class="btn btn-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                    <!-- Plain Text End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection