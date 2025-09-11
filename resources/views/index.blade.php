@extends('layouts.main')
@section('content')

	@include('inc.main_slider')

    
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

  <!-- blog section start -->
  <div class="blog_section layout_padding">
     <div class="container">
        <div class="row">
           <div class="col-md-6">
              <div class="blog_img"><img src="{{ asset('main/images/blog-img.png') }}"></div>
           </div>
           <div class="col-md-6">
              <h1 class="blog_taital">Easily Grow Your Business Earn More Money</h1>
              <p class="blog_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words There uffered alteration in some form, by injected humour, or randomised words </p>
              <div class="read_bt"><a href="#">Read More</a></div>
           </div>
        </div>
     </div>
  </div>
  <!-- blog section end -->

  <!-- testimonial section start -->
  <div class="testimonial_section layout_padding">
     <div id="my_carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
           <li data-target="#my_carousel" data-slide-to="0" class="active"></li>
           <li data-target="#my_carousel" data-slide-to="1"></li>
           <li data-target="#my_carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
           <div class="carousel-item active">
              <div class="container">
                 <h1 class="testimonial_taital">Testimonial</h1>
                 <p class="testimonial_text">majority have suffered alteration in some form, by injected humour, or </p>
                 <div class="testimonial_section_2">
                    <div class="row">
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="jonimo_taital_main">
                                <h4 class="jonimo_text">Jonimo</h4>
                                <div class="quick_icon"><img src="{{ asset('main/images/quick-icon.png') }}"></div>
                                <div class="quick_icon_1"><img src="{{ asset('main/images/quick-icon1.png') }}"></div>
                             </div>
                             <p class="dummy_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="jonimo_taital_main">
                                <h4 class="jonimo_text">Mark Duo</h4>
                                <div class="quick_icon"><img src="{{ asset('main/images/quick-icon.png') }}"></div>
                                <div class="quick_icon_1"><img src="{{ asset('main/images/quick-icon1.png') }}"></div>
                             </div>
                             <p class="dummy_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="carousel-item">
              <div class="container">
                 <h1 class="testimonial_taital">Testimonial</h1>
                 <p class="testimonial_text">majority have suffered alteration in some form, by injected humour, or </p>
                 <div class="testimonial_section_2">
                    <div class="row">
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="jonimo_taital_main">
                                <h4 class="jonimo_text">Jonimo</h4>
                                <div class="quick_icon"><img src="{{ asset('main/images/quick-icon.png') }}"></div>
                                <div class="quick_icon_1"><img src="{{ asset('main/images/quick-icon1.png') }}"></div>
                             </div>
                             <p class="dummy_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="jonimo_taital_main">
                                <h4 class="jonimo_text">Mark Duo</h4>
                                <div class="quick_icon"><img src="{{ asset('main/images/quick-icon.png') }}"></div>
                                <div class="quick_icon_1"><img src="{{ asset('main/images/quick-icon1.png') }}"></div>
                             </div>
                             <p class="dummy_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="carousel-item">
              <div class="container">
                 <h1 class="testimonial_taital">Testimonial</h1>
                 <p class="testimonial_text">majority have suffered alteration in some form, by injected humour, or </p>
                 <div class="testimonial_section_2">
                    <div class="row">
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="jonimo_taital_main">
                                <h4 class="jonimo_text">Jonimo</h4>
                                <div class="quick_icon"><img src="{{ asset('main/images/quick-icon.png') }}"></div>
                                <div class="quick_icon_1"><img src="{{ asset('main/images/quick-icon1.png') }}"></div>
                             </div>
                             <p class="dummy_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="testimonial_box">
                             <div class="jonimo_taital_main">
                                <h4 class="jonimo_text">Mark Duo</h4>
                                <div class="quick_icon"><img src="{{ asset('main/images/quick-icon.png') }}"></div>
                                <div class="quick_icon_1"><img src="{{ asset('main/images/quick-icon1.png') }}"></div>
                             </div>
                             <p class="dummy_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
  <!-- testimonial section end -->

@endsection
