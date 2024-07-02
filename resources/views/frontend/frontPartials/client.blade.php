<div class="client_section layout_padding">
    <div class="container">
        <h1 class="client_taital">Testimonial</h1>
        <div class="client_section_2">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">

                    @foreach ($testimonials as $i => $testi)
                        <div class="carousel-item {{ $i === 0 ? "active" : '' }} ">
                            <div class="client_main">
                                <div class="box_left">
                                    <p class="lorem_text">{{ $testi->quotation }}</p>
                                </div>
                                <div class="box_right">
                                    <div class="client_taital_left">
                                        <div class="client_img">
                                            <img src="{{ asset("admin/testi/$testi->image") }}" width="165"
                                                height="165">
                                        </div>
                                        <div class="quick_icon"><img src="frontend/images/quick-icon.png"></div>
                                    </div>
                                    <div class="client_taital_right">
                                        <h4 class="client_name">{{ $testi->name }}</h4>
                                        <p class="customer_text">Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
