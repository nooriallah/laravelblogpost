<!-- footer section start -->
<div class="footer_section layout_padding">
    <div class="container">
       <div class="input_btn_main overflow-hidden">
          <input type="text" class="mail_text" placeholder="Enter your email" name="Enter your email">
          <div class="subscribe_bt"><a href="#">Subscribe</a></div>
       </div>
       <div class="location_main">
          <div class="call_text "><img src="/frontend/images/call-icon.png"></div>
          <div class="call_text"><a href="callto:{{ $setting->phone }}">Call {{ $setting->phone }}</a></div>
          <div class="call_text"><img src="/frontend/images/mail-icon.png"></div>
          <div class="call_text"><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></div>
       </div>
       <div class="social_icon">
          <ul>
             <li><a href="{{ $setting->facebook }}"><img src="/frontend/images/fb-icon.png"></a></li>
             <li><a href="{{ $setting->twitter }}"><img src="/frontend/images/twitter-icon.png"></a></li>
             <li><a href="{{ $setting->linkedin }}"><img src="/frontend/images/linkedin-icon.png"></a></li>
             <li><a href="{{ $setting->instagram }}"><img src="/frontend/images/instagram-icon.png"></a></li>
          </ul>
       </div>
    </div>
 </div>
 <!-- footer section end -->
 <!-- copyright section start -->
 <div class="copyright_section py-12">
    <div class="container">
       <p class="copyright_text">2024 All Rights Reserved.</a></p>
    </div>
 </div>
 <!-- copyright section end -->
 <!-- Javascript files-->
 <script src="/frontend/js/jquery.min.js"></script>
 <script src="/frontend/js/popper.min.js"></script>
 <script src="/frontend/js/bootstrap.bundle.min.js"></script>
 <script src="/frontend/js/jquery-3.0.0.min.js"></script>
 <script src="/frontend/js/plugin.js"></script>
 <!-- sidebar -->
 <script src="/frontend/js/jquery.mCustomScrollbar.concat.min.js"></script>
 <script src="/frontend/js/custom.js"></script>
 <!-- javascript --> 
 <script src="/frontend/js/owl.carousel.js"></script>
 <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  