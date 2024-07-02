<!DOCTYPE html>
<html lang="en">
{{-- Head  --}}
@include('frontend.frontPartials.head')

<body>
    <!-- header section start -->
    <div class="header_section">

        {{-- main header  --}}
        @include('frontend.frontPartials.header')

        <!-- banner section start -->
        @include('frontend.frontPartials.banner')

        <!-- banner section end -->
    </div>
    <!-- header section end -->

    <!-- services section start -->
    @include('frontend.frontPartials.services')
    <!-- services section end -->


    <!-- about section start -->
    @include('frontend.frontPartials.about')
    <!-- about section end -->


    <!-- blog section start -->
    @include('frontend.frontPartials.video')
    <!-- blog section end -->


    <!-- client section start -->
    @include('frontend.frontPartials.client')
    <!-- client section end -->


    <!-- choose section start -->
    @include('frontend.frontPartials.choose')
    <!-- choose section end -->

    {{-- Footer --}}
    @include('frontend.frontPartials.footer')

</body>

</html>
