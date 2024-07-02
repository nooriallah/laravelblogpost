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
    @include('frontend.frontPartials.contact')
    <!-- about section end -->


    {{-- Footer --}}
    @include('frontend.frontPartials.footer')

</body>

</html>
