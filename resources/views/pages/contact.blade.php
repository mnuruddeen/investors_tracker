@extends('layouts.main')
@section('content')
    
    <!-- contact section start -->
  <div class="contact_section layout_padding">
     <div class="container">
        <h1 class="contact_taital">Get In Touch</h1>
        <p class="contact_text">majority have suffered alteration in some form, by injected humour, or </p>
        <div class="contact_section_2 layout_padding">
           <div class="row">
              <div class="col-md-6">
                 <div class="contact_main">
                    <input type="text" class="mail_text" placeholder="Full Name" name="Full Name">
                    <input type="text" class="mail_text" placeholder="Phone Number" name="Phone Number">
                    <input type="text" class="mail_text" placeholder="Email" name="Email">
                    <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                    <div class="send_bt"><a href="#">SEND</a></div>
                 </div>
              </div>
              <div class="col-md-6">
                 <div class="map_main">
                    <div class="map-responsive">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.4566176394374!2d9.823777273975065!3d10.305293967709291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1054d7d334ca3a97%3A0x40f5d4c79b2d48e3!2sAbubakar%20Umar%20Seceteriat%20Bauchi!5e0!3m2!1sen!2sng!4v1697542310861!5m2!1sen!2sng" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
  <!-- contact section end -->
@endsection

