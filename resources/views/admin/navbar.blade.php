
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="home" class="nav-link">Home</a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


        <!-- Notifications Dropdown Menu -->


        <li class="nav-item">
            <a class="nav-link" href="admin-search"><i
                        class="fa fa-search"></i></a>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                        class="fa fa-th-large"></i></a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
        <img src="images/logo.png" alt="BlueStream Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">BlueStream</span>
    </a>


    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="others/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="dashboard" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="dashboard" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>

                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-newspaper-o"></i>
                        <p>
                            Posts
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="all-posts" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>All Posts
                                    <span class="badge badge-info right">{{count($posts)}}</span>
                                </p>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="all-drafts" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Drafts
                                    <span class="badge badge-danger right">{{count($drafts)}}</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="new-post" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Create Post</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>
                            Categories
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="categories" class="nav-link">

                                <p>All Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add-category" class="nav-link">

                                <p>Add Category</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
                    <a href="all-comments" class="nav-link">
                        <i class="fa fa-comment-o nav-icon"></i>
                        <p>All Comments</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="admin-search" class="nav-link">
                        <i class="fa fa-search nav-icon"></i>
                        <p>Search</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="register" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <p>Register User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./logout" class="nav-link">
                        <i class="nav-icon fa fa-home text-danger"></i>
                        <p class="text">Log Out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>