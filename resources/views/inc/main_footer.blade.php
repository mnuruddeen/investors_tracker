<!-- footer section start -->
  <div class="footer_section layout_padding">
     <div class="container">
        <div class="location_main">
           <div class="location_text"><img src="{{ asset('main/images/map-icon.png') }}"><span class="padding_left_10"><a href="#">{{ config('app.address') }}</a></span></div>
            <div class="location_text center"><img src="{{ asset('main/images/call-icon.png') }}"><span class="padding_left_10"><a href="#">Call {{ config('app.phone') }}</a></span></div>
           <div class="location_text right"><img src="{{ asset('main/images/mail-icon.png') }}"><span class="padding_left_10"><a href="mailto:{{ config('app.email') }}">{{ config('app.email') }}</a></span></div>
        </div>

      <div class="footer_section_2">
         <div class="row">
            <div class="col-lg-4">
               <h2 class="footer_taital">About</h2>
               <p class="footer_text">There are many variations of passages of Lorem Ipsum available, but the majority havThere are many variations of passages of Lorem Ipsum available, but the majority hav</p>
            </div>
            <div class="col-lg-4">
               <h2 class="footer_taital">Services Link</h2>
               <p class="footer_text">There are many variations of passages of Lorem Ipsum available, but the majority havThere are many variations of passages of Lorem Ipsum available, but the majority hav</p>
            </div>
            <div class="col-lg-4">
               <h2 class="footer_taital">Subscribe</h2>
               <input type="text" class="Enter_text" placeholder="Enter Your Email" name="Enter Your Email">
               <div class="subscribe_bt"><a href="#">Subscribe</a></div>
               <div class="social_icon">
                  <ul>
                     <li><a href="#"><img src="{{ asset('main/images/fb-icon.png') }}"></a></li>
                     <li><a href="#"><img src="{{ asset('main/images/twitter-icon.png') }}"></a></li>
                     <li><a href="#"><img src="{{ asset('main/images/linkedin-icon.png') }}"></a></li>
                     <li><a href="#"><img src="{{ asset('main/images/instagram-icon.png') }}"></a></li>
                     <li><a href="#"><img src="{{ asset('main/images/youtub-icon.png') }}"></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- footer section end -->

<!-- copyright section start -->
<div class="copyright_section">
   <div class="container">
      <p class="copyright_text">Copyright &copy; {{ date('Y') }} {{ config('app.name') }}. All Right Reserved</p>
   </div>
</div>
<!-- copyright section end -->
