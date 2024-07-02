<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="/admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">Nooriallah Qayoumi</h1>
            <p>Web Developer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class=""><a href="{{ route('home') }}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="#posts" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i>Posts </a>
            <ul id="posts" class="collapse list-unstyled ">
                <li><a href="{{ route('show') }}"> <i class="icon-list-1"></i>All posts </a></li>
                <li><a href="{{ route('create') }}"> <i class="fa fa-plus-square"></i>Add post </a></li>
                <li><a href="{{ route('trashed') }}"> <i class="fa fa-trash-o"></i>Trashed post </a></li>
            </ul>
        </li>

        <li><a href="{{ route('about') }}"> <i class="fa fa-info-circle"></i>About Info </a></li>

        <li><a href="#testis" aria-expanded="false" data-toggle="collapse">
                <i class="fa fa-list-alt"></i>Testimonials </a>
            <ul id="testis" class="collapse list-unstyled ">
                <li><a href="{{ route('showtesti') }}"> <i class="fa fa-quote-left"></i>All testimonials</a></li>
                <li><a href="{{ route('createtesti') }}"> <i class="fa fa-plus-square-o"></i>Add new</a></li>
            </ul>
        </li>
        <li><a href="{{ route('charts') }}"> <i class="fa fa-bar-chart"></i>Statistics</a></li>

    </ul>
    <span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li><a href="{{ route('setting') }}"> <i class="fa fa-gear"></i>Settings </a></li>

    </ul>
</nav>
