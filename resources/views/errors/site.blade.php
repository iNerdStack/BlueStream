<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BlueStream</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    @include('admin.css')

</head>
<body>
<div class="wrapper">

    <div class="container">

        <div class="topnav" style="margin-top: 20px">
            <a href="#" class="active">BlueStream</a>

            <a href="javascript:void(0);" class="icon iconshowhide" onclick="NavBarFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>

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
                <h2 class="headline text-warning"> 503</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-warning"></i> Oops! Site not properly configured</h3>

                    <p>
                        Please ensure that you have followed the steps on the github page on how to set up
                        this website.
                        <br/>
                        <b>Possible reasons</b>
                        <br/>
                        1. Database is not propely connected. Check database information and correct them.
                        <br/>
                        2. Page admin has not being registered.
                        <br/>
                        If you have check and still have issues, click  <a href="https://github.com/iNerdStack/BlueStream">here</a> to see documentation.
                    </p>

                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-sm-none d-md-block">
                BlueStream
            </div>


            <strong>Copyright &copy; 2020 <a href="https://github.com/iNerdStack/BlueStream">BlueStream</a>.</strong> All rights reserved.
        </footer>
    </div>
</div>
<!-- ./wrapper -->



</body>
</html>
