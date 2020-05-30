<?php
/**
 * Created by PhpStorm.
 * User: ISAAC
 * Date: 3/16/2019
 * Time: 3:34 PM
 */

?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <title>Add Category</title>

    <script src="js/jquery.js"></script>

    <link rel="stylesheet" href="others/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="others/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



    @if(session('response'))

        <script>
            $(document).ready(function() {

                $('#myModal').modal('show');

            });

        </script>

    @endif

</head>

<body class="hold-transition sidebar-mini">

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Status</h4>
            </div>
            <div class="modal-body">
                @if(session('response'))
                    {{session('response')}}
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <!-- Navbar -->

    @include('admin.navbar')


    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">



                <div class="row">

                    <div class="col-xl-9 center-block">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Add Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('addCategory') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">

                                        <input id="category" type="text" class="form-control" name="category" value="{{ old('category') }}" placeholder="Enter Category">

                                        @if ($errors->has('post_title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                        @endif

                                    </div>

                                    <div class="form-group{{ $errors->has('cat_image') ? ' has-error' : '' }}">
                                        <div class="col-md-9">

                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="cat_image" name="cat_image">
                                                    <label class="custom-file-label" for="cat_image">Select Category Image</label>

                                                    @if ($errors->has('cat_image'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('cat_image') }}</strong>
                                    </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <p class="help-block">Max. 500kb</p>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="float-right">
                                            <button type="submit" name="submit" value="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Add Category</button>
                                        </div>

                                    </div>

                                    <div class="card-body p-0">
                                        <div class="table-responsive">







                                        </div>
                                        <!-- /.table-responsive -->

                                    </div>

                                    <!-- /.card-footer -->
                                </form>


                            </div>
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                    </div>




                    <!-- /.row -->
                </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

@include('admin.footer')
</div>
<!-- ./wrapper -->

@include('admin.js')
</body>
</html>

