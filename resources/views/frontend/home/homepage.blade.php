<!DOCTYPE html>
<html lang="en">
{{-- Head  --}}
@include('frontend.home.head')

<body>
    <!-- header section start -->
    <div class="header_section">

        {{-- main header  --}}
        @include('frontend.home.header')

        <!-- banner section start -->
        @include('frontend.home.banner')

        <!-- banner section end -->
    </div>
    <!-- header section end -->

    <!-- services section start -->
    @include('frontend.home.services')

    <!-- services section end -->


    <!-- about section start -->
    @include('frontend.home.about')
    <!-- about section end -->


    <!-- blog section start -->
    @include('frontend.home.video')
    <!-- blog section end -->


    <!-- client section start -->
    @include('frontend.home.client')
    <!-- client section end -->


    <!-- choose section start -->
    @include('frontend.home.choose')
    <!-- choose section end -->

    {{-- Footer --}}
    @include('frontend.home.footer')

</body>

</html>
