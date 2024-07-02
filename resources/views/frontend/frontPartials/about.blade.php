<div class="about_section layout_padding">
    <div class="container-fluid">
       <div class="row">
          <div class="col-md-6">
             <div class="about_taital_main">
                <h1 class="about_taital">About Us</h1>
                <p class="about_text">{{ $about->text }} </p>
                <div class="readmore_bt"><a href="#">Read More</a></div>
             </div>
          </div>
          <div class="col-md-6 padding_right_0">
             <div><img src="{{ asset("/admin/aboutimage/$about->image") }}" class="about_img"></div>
          </div>
       </div>
    </div>
 </div>