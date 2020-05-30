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
    <title>All Comments</title>

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
            $("#checkallunapprovedcomments").change(function(){
                var checked = $(this).is(':checked');
                if(checked){
                    $(".unapprovedcommentcheckbox").each(function(){
                        $(this).prop("checked",true);
                    });
                }else{
                    $(".unapprovedcommentcheckbox").each(function(){
                        $(this).prop("checked",false);
                    });
                }
            });

            // Changing state of CheckAll checkbox
            $(".unapprovedcommentcheckbox").click(function(){

                if($(".unapprovedcommentcheckbox").length == $(".checkbox:checked").length) {
                    $("#unapprovedcommentall").prop("checked", true);
                } else {
                    $("#unapprovedcommentall").removeAttr("checked");
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
                        <h1>Posts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Comments</li>
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
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Unapproved Comments</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>




                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/CommentAction') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>

                                            <tr>
                                                <th>
                                                    <input type="checkbox" id='checkallunapprovedcomments'  />
                                                </th>
                                                <th>S/N</th>
                                                <th>Name / Email</th>
                                                <th>Comment</th>
                                                <th>Status</th>
                                                <th>Task</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if(count($NotApprovedComments) > 0)
                                                <!-- {{ $sn = 0 }} -->
                                                @foreach($NotApprovedComments as $comment)
                                                    <tr>
                                                        <td> <span class="button-checkbox">
     <input type="checkbox" name="comment[]" class='unapprovedcommentcheckbox' value="{{$comment->id}}" />
    </span></td>
                                                        <td>{{$sn = $sn + 1}}</td>
                                                        <td>
                                                            {{$comment->name}}
                                                        </td>
                                                        <td>{{$comment->comment}}</td>
                                                        <td>
                                                            <span class="badge bg-danger">Unapproved</span>

                                                        </td>

                                                        <td>
                                                            <a onClick="javascript: return confirm('Are You Sure You Want To Delete Comment(s)');" href="delete/comment/{{$comment->id}}" class="btn btn-sm btn-danger"><span class="fa fa-remove"></span></a>

                                                        </td>


                                                    </tr>

                                                @endforeach
                                            @endif

                                            </tbody>

                                        </table>

                                    </div>
                                    <!-- /.table-responsive -->

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">

                                    <nav> <ul class="pagination justify-content-end">

                                        </ul></nav>
                                    <div class="float-left">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

                                            <ul class="pagination">

                                                {{$NotApprovedComments->links('layouts.paginate')}}

                                            </ul></div>

                                    </div>
                                    <button type="submit" class="btn btn-sm btn-danger float-right" name="delete" value="delete">
                                        Delete
                                    </button>

                                    <button type="submit" class="btn btn-sm btn-success"  name="approve" value="approve">
                                        Approve
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>


                    </div>
                    <div class="col-md-12">


                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">All Comments</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>




                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/CommentAction') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>

                                            <tr>
                                                <th>
                                                    <input type="checkbox" id='checkallcomments'  />
                                                </th>
                                                <th>S/N</th>
                                                <th>Name / Email</th>
                                                <th>Comment</th>
                                                <th>Status</th>
                                                <th>Task</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if(count($comments) > 0)
                                                <!-- {{ $sn = 0 }} -->
                                                @foreach($comments as $comment)
                                                    <tr>
                                                        <td> <span class="button-checkbox">
     <input type="checkbox" name="comment[]" class='commentcheckbox' value="{{$comment->id}}" />
    </span></td>
                                                        <td>{{$sn = $sn + 1}}</td>
                                                        <td>
                                               {{$comment->name}}
                                                        </td>
                                                        <td>{{$comment->comment}}</td>
                                                        <td>
                                                            @if($comment->isCommentApproved == '0')
                                                                <span class="badge bg-danger">Unapproved</span>
                                                             @else
                                                                <span class="badge bg-success">Approved</span>
                                                            @endif

                                                        </td>

                                                        <td>
                                                            <a onClick="javascript: return confirm('Are You Sure You Want To Delete Comment(s)');" href="delete/comment/{{$comment->id}}" class="btn btn-sm btn-danger"><span class="fa fa-remove"></span></a>

                                                        </td>


                                                    </tr>

                                                @endforeach
                                            @endif

                                            </tbody>

                                        </table>

                                    </div>
                                    <!-- /.table-responsive -->

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">

                                    <nav> <ul class="pagination justify-content-end">

                                     </ul></nav>

                                    <button type="submit" class="btn btn-sm btn-danger float-right" name="delete" value="delete">
                                        Delete
                                    </button>

                                    <button type="submit" class="btn btn-sm btn-success" name="approve" value="approve">
                                        Approve
                                    </button>

                                    <button type="submit" class="btn btn-sm btn-dark" name="unapprove" value="unapprove">
                                        Unapprove
                                    </button>
<br/>
                                    <div class="float-right" style="margin-top: 20px">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

                                            <ul class="pagination">

                                                {{$comments->links('layouts.paginate')}}

                                            </ul></div>

                                    </div>
                                </div>
                                <!-- /.card-footer -->
                            </form>
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

