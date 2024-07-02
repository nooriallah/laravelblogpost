<!DOCTYPE html>
<html lang="en">
{{-- Head  --}}
@include('frontend.frontPartials.head')

<body>
    <!-- header section start -->
    <div class="header_section">

        {{-- main header  --}}
        @include('frontend.frontPartials.header')

    </div>
    <!-- header section end -->

    <div>

        <div class="container w-50 mb-5 ">
            <img src="{{ asset("postimages/$post->image") }}" class=" img-fluid mt-5 pt-5" alt="post image">

            <h1 class="mt-3" style="font-size: 30px">{{ $post->title }}</h1>

            <p class="mt-4">{{ $post->description }}</p>

            <p class="mt-5">
                Writeded by: <strong>{{ $post->name }}</strong> <br>
                Published at: <strong>{{ $post->created_at->diffForHumans() }}</strong>
            </p>
        </div>


    </div>



    {{-- Footer --}}
    @include('frontend.frontPartials.footer')

</body>

</html>
