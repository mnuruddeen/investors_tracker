@extends('layouts.main')
@section('content')

  <!--about section start -->
  <div class="about_section layout_padding">
     <div class="container">
        <h1 class="about_taital">About Us</h1>
        <p class="about_text">It is a long established fact that a reader will be distracted by the readable content of a page when</p>
        <div class="about_section_2">
           <div class="row">
              <div class="col-lg-6">
                 <div class="about_image"><img src="{{ asset('main/images/about-img.png') }}"></div>
              </div>
              <div class="col-lg-6">
                 <div class="about_taital_main">
                    <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words </p>
                    <div class="read_bt"><a href="{{ url('about-us') }}">Read More</a></div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
  <!--about section end -->
  
  <!-- services section start -->
  <div class="services_section layout_padding">
     <div class="container">
        <h1 class="services_taital">What We Do</h1>
        <p class="about_text">It is a long established fact that a reader will be distracted by the readable content of a page when</p>
        <div class="services_section_2">
           <div class="row">
              <div class="col-lg-4">
                 <div class="icon_box">
                    <div class="icon_1"><img src="{{ asset('main/images/icon-1.png') }}"></div>
                 </div>
                 <h4 class="selection_text">Selection of Business</h4>
                 <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form, by injected humour, or randomised</p>
                 <div class="icon_box">
                    <div class="icon_1"><img src="{{ asset('main/images/icon-4.png') }}"></div>
                 </div>
                 <h4 class="selection_text">Securities Transactions</h4>
                 <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form, by injected humour, or randomised</p>
              </div>
              <div class="col-lg-4">
                 <div class="icon_box">
                    <div class="icon_1"><img src="{{ asset('main/images/icon-2.png') }}"></div>
                 </div>
                 <h4 class="selection_text">Research and Analytics</h4>
                 <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form, by injected humour, or randomised</p>
                 <div class="icon_box">
                    <div class="icon_1"><img src="{{ asset('main/images/icon-5.png') }}"></div>
                 </div>
                 <h4 class="selection_text">Advisory Activities</h4>
                 <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form, by injected humour, or randomised</p>
              </div>
              <div class="col-lg-4">
                 <div class="icon_box">
                    <div class="icon_1"><img src="{{ asset('main/images/icon-3.png') }}"></div>
                 </div>
                 <h4 class="selection_text">Business Plans</h4>
                 <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form, by injected humour, or randomised</p>
                 <div class="icon_box">
                    <div class="icon_1"><img src="{{ asset('main/images/icon-6.png') }}"></div>
                 </div>
                 <h4 class="selection_text">Management and Asset</h4>
                 <p class="ipsum_text">There are many variations of passages of Lorem Ipsum available, but the form, by injected humour, or randomised</p>
              </div>
           </div>
        </div>
     </div>
  </div>
  <!-- services section end -->

@endsection

