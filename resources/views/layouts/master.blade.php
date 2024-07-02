<!DOCTYPE html>
<html>
{{-- Head tag --}}
@include('admin.partials.head')


<body>

    {{-- Header --}}
    @include('admin.partials.header')

    <div class="d-flex align-items-stretch">

        {{-- Sidebar --}}
        @include('admin.partials.sidebar')


        {{-- Main contents --}}
        @yield('content')

    </div>


    </div>

    @include('admin.partials.footer')
</body>

</html>
