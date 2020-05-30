 <div class="topnav" style="margin-top: 20px">
     <a href="#" class="active">BlueStream</a>
        <div id="myLinks">

            <a href="home">Home</a>
            <a href="category">Categories</a>
            @if(Auth::user())
                    <a href="dashboard" class="nav-link">Dashboard</a>
            @endif
        </div>
        <a href="javascript:void(0);" class="icon iconshowhide" onclick="NavBarFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>


<nav class="main-header navbar navbar-expand  navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav" style="margin-left: 20px">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="home" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="category" class="nav-link">Categories</a>
        </li>

        @if(Auth::user())
        <li class="nav-item d-none d-sm-inline-block">
            <a href="dashboard" class="nav-link">Dashboard</a>
        </li>
            @endif
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <form class="form-inline ml-6" action="{{ url('/search') }}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>


    </ul>
</nav>