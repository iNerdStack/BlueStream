<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BlueStream</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('admin.css')

</head>
<body>
<div class="wrapper">

    <div class="container">

    @include('home.homenavbar')

    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" >
            </div>
            <!-- /.container-fluid -->
        </section>
        <section class="content" style="margin-bottom: 150px;">
            <div class="error-page">
                <h2 class="headline text-warning"> 404</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-warning"></i> Oops! Page not found.</h3>

                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <a href="home">return home</a> or try using the search form.
                    </p>

                    <form class="search-form" method="POST" action="{{ url('/search') }}" enctype="multipart/form-data">

                        {{csrf_field()}}
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" name="submit" class="btn btn-warning"><i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.input-group -->
                    </form>
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->

        @include('admin.footer')
    </div>
</div>
<!-- ./wrapper -->

@include('admin.js')
</body>
</html>
