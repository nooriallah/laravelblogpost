<div class="header_main">
    <div class="mobile_menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo_mobile"><a href="index.html"><img src="/frontend/images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="contact.html">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="logo d-flex justify-content-center align-items-center"><a href="{{ route('home') }}"><img src="/frontend/images/logo.png"></a></div>
        <div class="menu_main">
            <ul>
                <li class="active"><a href="/">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li>
                    @if (Route::has('login'))
                        @auth
                        
                            <x-app-layout>                                  
                            </x-app-layout>
                        @else
                            <a href="{{ route('login') }}">Login</a> /
                            <a href="{{ route('register') }}">Register</a>
                        @endauth
                    @endif
                </li>

            </ul>
        </div>
    </div>
</div>
