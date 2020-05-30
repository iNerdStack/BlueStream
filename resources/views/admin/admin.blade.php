<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <title>Dashboard</title>

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
            $("#checkallpost").change(function(){
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
                    $("#checkallpost").prop("checked", true);
                } else {
                    $("#checkallpost").removeAttr("checked");
                }

            });
        });
    </script>



    <script type='text/javascript'>
        $(document).ready(function(){
            // Check or Uncheck All checkboxes
            $("#checkalldrafts").change(function(){
                var checked = $(this).is(':checked');
                if(checked){
                    $(".draftcheckbox").each(function(){
                        $(this).prop("checked",true);
                    });
                }else{
                    $(".draftcheckbox").each(function(){
                        $(this).prop("checked",false);
                    });
                }
            });

            // Changing state of CheckAll checkbox
            $(".draftcheckbox").click(function(){

                if($(".draftcheckbox").length == $(".checkbox:checked").length) {
                    $("#checkalldrafts").prop("checked", true);
                } else {
                    $("#checkalldrafts").removeAttr("checked");
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
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-md-8">


                        <!-- TABLE: RECENT POSTS -->

                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Recent Posts</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>




                            <!-- /.card-header -->
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/PostAction') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <div class="card-body p-0">
                                <div class="table-responsive">
                                        <table class="table m-0">
                                        <thead>

                                        <tr>
                                        <th>
                                                <input type="checkbox" id='checkallpost'  />
                                            </th>
                                            <th>S/N</th>
                                            <th>Title</th>
                                            <th>Task</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(count($posts) > 0)
                                           <!-- {{ $sn = 0 }} -->
                                            @foreach($posts->take(5) as $post)
                                                <tr>
                                                <td> <span class="button-checkbox">
     <input type="checkbox" name="post[]" class='postcheckbox' value="{{$post->id}}" />
    </span></td>
                                                    <td>{{$sn = $sn + 1}}</td>
                                                    <td>{{$post->post_title}}</td>
                                                    <td width="20%">
                                                        <a href="./url_{{$post->post_slug}}" class="btn btn-sm btn-info"><span class="fa fa-newspaper-o"></span></a>
                                                        <a href="edit_{{$post->id}}" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span></a>
                                                        <a onClick="javascript: return confirm('Are You Sure You Want To Delete Post');" href="delete/{{$post->id}}" class="btn btn-sm btn-danger"><span class="fa fa-remove"></span></a>
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
                                <button type="submit" class="btn btn-sm btn-danger float-left"  name="delete" value="delete">
                                    Delete
                                </button>
                                <button type="submit" class="btn btn-sm btn-danger float-right" name="unpublish" value="unpublish">
                                    Unpublish
                                </button>
                            </div>
                            <!-- /.card-footer -->
                            </form>
                        </div>

                    <!-- /.col -->
                </div>
                    <div class="col-md-4">


                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Recent Categories</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>




                            <!-- /.card-header -->
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/CategoryAction') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>

                                            <tr>
                                                <th>
                                                    <input type="checkbox" id='checkallcategories'  />
                                                </th>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Task</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if(count($categories) > 0)
                                                <!-- {{ $sn = 0 }} -->
                                                @foreach($categories->take(5) as $category)
                                                    <tr>
                                                        <td> <span class="button-checkbox">
     <input type="checkbox" name="category[]" class='categorycheckbox' value="{{$category->id}}" />
    </span></td>
                                                        <td>{{$sn = $sn + 1}}</td>
                                                        <td>{{$category->category}}</td>
                                                        <td>
                                                            <a href="edit/category/{{$post->id}}" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span></a>
                                                            <a onClick="javascript: return confirm('Are You Sure You Want To Delete Category');" href="delete/category/{{$category->id}}" class="btn btn-sm btn-danger"><span class="fa fa-remove"></span></a>
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
                                    <button type="submit" class="btn btn-sm btn-danger float-left"  name="delete" value="delete">
                                        Delete
                                    </button>
                                    <button type="submit" class="btn btn-sm btn-danger float-right"  name="unpublish" value="unpublish">
                                        Unpublish
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>






                        <!-- /.col -->
                    </div>

                    <!-- /.row -->

                    <div class="col-md-6">


                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Recent Drafts</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>




                            <!-- /.card-header -->
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/DraftAction') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>

                                            <tr>
                                                <th>
                                                    <input type="checkbox" id="checkalldrafts"  />
                                                </th>
                                                <th>S/N</th>
                                                <th>Title</th>
                                                <th>Task</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if(count($drafts) > 0)
                                                <!-- {{ $sn = 0 }} -->
                                                @foreach($drafts->take(5) as $draft)
                                                    <tr>
                                                        <td> <span class="button-checkbox">
     <input type="checkbox" name="draft[]" class='draftcheckbox' value="{{$draft->id}}" />
    </span></td>
                                                        <td>{{$sn = $sn + 1}}</td>
                                                        <td>{{$draft->post_title}}</td>

                                                        <td width="20%">
                                                            <a href="./url_{{$draft->post_slug}}" class="btn btn-sm btn-info"><span class="fa fa-newspaper-o"></span></a>
                                                            <a href="edit_{{$draft->id}}" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span></a>
                                                            <a href="publish/{{$draft->id}}" class="btn btn-sm btn-info"><span class="fa fa-pencil"></span></a>
                                                            <a  onClick="javascript: return confirm('Are You Sure You Want To Delete Post');" href="delete/{{$draft->id}}" class="btn btn-sm btn-danger"><span class="fa fa-remove"></span></a>

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
                                    <button type="submit" class="btn btn-sm btn-danger float-left"  name="delete" value="delete">
                                        Delete
                                    </button>
                                    <button type="submit" class="btn btn-sm btn-primary float-right" name="unpublish" value="unpublish">
                                        Publish
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Recent Comments</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>




                            <!-- /.card-header -->
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/CommentAction') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>

                                            <tr>

                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Comment</th>
                                                <th>Task</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if(count($comments) > 0)
                                                <!-- {{ $sn = 0 }} -->
                                                @foreach($comments->take(5) as $comment)
                                                    <tr>

                                                        <td>{{$sn = $sn + 1}}</td>
                                                        <td>{{$comment->name}}</td>
                                                        <td>{{$comment->comment}}</td>

                                                        <td width="40%">
                                                            @if($comment->isCommentApproved == '0')
                                                                <a href="approve/{{$comment->id}}" class="btn btn-sm btn-info">Approve</a>

                                                            @else
                                                                <a href="unapprove/{{$comment->id}}" class="btn btn-sm btn-default">Unapprove</a>
                                                            @endif
                                                            <a  onClick="javascript: return confirm('Are You Sure You Want To Delete Post');" href="delete/comment/{{$comment->id}}" class="btn btn-sm btn-danger"><span class="fa fa-remove"></span></a>

                                                        </td>

                                                    </tr>

                                                @endforeach
                                            @endif

                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- /.table-responsive -->

                                </div>

                                <!-- /.card-footer -->
                            </form>
                        </div>

                    </div>



            </div>


            </div>



        </section>
    </div>

    @include('admin.footer')

</div>



@include('admin.js')
</body>
</html>
