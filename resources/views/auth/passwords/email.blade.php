<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../others/plugins/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../others/dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../others/plugins/iCheck/flat/blue.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../others/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../js/ckeditor/contents.css">


    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="../js/ckeditor/ckeditor.js"  crossorigin="anonymous"></script>


    <style>

        .topnav {
            overflow: hidden;
            background-color: #333;
            position: relative;
        }

        .topnav #myLinks {
            display: none;
        }

        .topnav a {
            color: white;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            display: block;
        }

        .topnav a.icon {
            display: block;
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav a:hover {
            background-color: #12a8dd;

        }

        .active {
            background-color: #0b6eaf;
            color: white;
        }

        .iconshowhide {
            display: none !important;
        }
        @media(max-height: 360px), (max-width: 768px) {
            .iconshowhide {
                display: block !important;
            }
        }

    </style>

    <script>
        function NavBarFunction() {
            var x = document.getElementById("myLinks");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>

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


        <div align="center" style="margin: auto;">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div></div>

        @include('admin.footer')
    </div>
</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../others/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../others/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../others/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../others/dist/js/demo.js"></script>



<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="../others/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="../others/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../others/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../othersplugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="../others/plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../others/dist/js/pages/dashboard2.js"></script>
</body>
</html>
