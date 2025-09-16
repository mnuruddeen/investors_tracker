@extends('layouts.main')
@section('content')

	@include('inc.main_slider')


  <!--about section start -->
  <div class="about_section layout_padding">
     <div class="container">
        <h1 class="about_taital">About Us</h1>
        <p class="about_text">The Bauchi State Investment Tracking System (BSITS) is a digital platform designed to monitor, manage, and evaluate investments across the state. It provides a centralized database for capturing investment activities, linking them to specific Local Government Areas (LGAs) and sectors.</p>
        <div class="about_section_2">
           <div class="row">
              <div class="col-lg-6">
                 <div class="about_image"><img src="{{ asset('main/images/about-img.png') }}"></div>
              </div>
              <div class="col-lg-6">
                 <div class="about_taital_main">
                    <p class="lorem_text">
                        The system enables:
                        <ul>
                         <li>Real-time tracking of business registrations, project progress, and investment values.</li>
                         <li>Transparency and accountability by providing government, investors, and stakeholders with reliable data.</li>
                         <li>Decision support for policy makers through detailed reports on job creation, sectoral distribution, and regional investment flows.</li>
                         <li>Investor engagement by showcasing opportunities and measuring impact across Bauchi State.</li>
                         <li> By integrating state–local relationships, the platform ensures that every investment is mapped to its location, creating a clear picture of development across all LGAs.</li>
                     </ul>
                        Goal: To drive economic growth, attract investors, and strengthen confidence in Bauchi State’s business environment through transparent and efficient investment monitoring.

                    </p>
                    <div class="read_bt"><a href="{{ url('about-us') }}">Read More</a></div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
  <!--about section end -->



@endsection
