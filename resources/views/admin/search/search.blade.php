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

    <title>Search</title>

    <script src="js/jquery.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="others/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="others/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">





    <script type='text/javascript'>
        $(document).ready(function(){
            // Check or Uncheck All checkboxes
            $("#checkallposts").change(function(){
                var checked = $(this).is(':checked');
                if(checked){
                    $(".postcheckbox").each(function(){
                        $(this).prop("checked",true);
                    });
                }else{
                    $(".postcheckbox").each(function(){
                        $(this).prop("checked",false);
                    });
                }
            });

            // Changing state of CheckAll checkbox
            $(".postcheckbox").click(function(){

                if($(".postcheckbox").length == $(".checkbox:checked").length) {
                    $("#postallcategories").prop("checked", true);
                } else {
                    $("#postallcategories").removeAttr("checked");
                }

            });
        });
    </script>
    <script type='text/javascript'>
        $(document).ready(function(){
            // Check or Uncheck All checkboxes
            $("#checkallcomments").change(function(){
                var checked = $(this).is(':checked');
                if(checked){
                    $(".commentcheckbox").each(function(){
                        $(this).prop("checked",true);
                    });
                }else{
                    $(".commentcheckbox").each(function(){
                        $(this).prop("checked",false);
                    });
                }
            });

            // Changing state of CheckAll checkbox
            $(".commentcheckbox").click(function(){

                if($(".commentcheckbox").length == $(".checkbox:checked").length) {
                    $("#commentallcategories").prop("checked", true);
                } else {
                    $("#commentallcategories").removeAttr("checked");
                }

            });
        });
    </script>
    <script type='text/javascript'>
        $(document).ready(function(){
            // Check or Uncheck All checkboxes
            $("#checkallcategories").change(function(){
                var checked = $(this).is(':checked');
                if(checked){
                    $(".categorycheckbox").each(function(){
                        $(this).prop("checked",true);
                    });
                }else{
                    $(".categorycheckbox").each(function(){
                        $(this).prop("checked",false);
                    });
                }
            });

            // Changing state of CheckAll checkbox
            $(".categorycheckbox").click(function(){

                if($(".categorycheckbox").length == $(".checkbox:checked").length) {
                    $("#checkallcategories").prop("checked", true);
                } else {
                    $("#checkallcategories").removeAttr("checked");
                }

            });
        });
    </script>

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
                        <h1>Search</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Search</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-md-12">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search</h3>

                                <div class="card-tools">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/adminsearch') }}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="input-group input-group-sm" style="width: 350px;">
                                        <input type="text" name="search" id="search" class="form-control float-right" placeholder="Search" required>

                                        <div class="input-group-append">
                                            <select  name="search_type" id="search_type" class="input-group form-control">
                                                <option value="Post">Posts</option>
                                                <option value="Category">Categories</option>
                                                <option value="Comment">Comments</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i>Search</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                @if($searchtype == 'None')

                                    <div align="center"><h4>Search Post, Category Or Commment</h4></div>

                                @elseif($searchtype == 'Post')
                                @include('admin.search.posts')
                                @elseif($searchtype == 'Category')
                                    @include('admin.search.categories')
                                @elseif($searchtype == 'Comment')
                                    @include('admin.search.comments')
                                @endif




                            </div>
                    </div>

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

