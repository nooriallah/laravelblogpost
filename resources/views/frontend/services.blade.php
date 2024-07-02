<!DOCTYPE html>
<html lang="en">
{{-- Head  --}}
@include('frontend.frontPartials.head')

<body>
    <!-- header section start -->
    <div class="header_section">

        {{-- main header  --}}
        @include('frontend.frontPartials.header')

        <!-- banner section end -->
    </div>
    <!-- header section end -->


    <!-- about section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital">Services </h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority
                have
                suffered alteration</p>
            <div class="services_section_2">
                <div class="row">

                    @foreach ($posts as $post)
                        <div class="col-md-4 mb-5">
                            <div>
                                <img src="{{ asset("postimages/$post->image") }}" style="width: 350px; height: 400px"
                                    class="s ervices_img">
                            </div>
                            <h1 style="font-size: 20px; margin-top: 30px">
                                {{ \Illuminate\Support\Str::limit($post->title, 30, '...') }}</h1>
                            <div class="btn_main ">
                                <a href="{{ route('singlepostpage', $post->id) }}">Read more</a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>

    <!-- about section end -->


    {{-- Footer --}}
    @include('frontend.frontPartials.footer')

</body>

</html>
