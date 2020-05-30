<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$postz->post_title}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="others/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="others/plugins/iCheck/flat/blue.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="others/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="js/ckeditor/ckeditor.js"  crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

@include('admin.navbar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" >

          <div class="col-md-6">
          @if(count($errors) > 0)
              @foreach($errors->all() as $error)
                  <div class="alert alert-danger">{{$error}}</div>
              @endforeach
          @endif

          @if(session('response'))
              <div class="alert alert-success">{{session('response')}}</div>
          @endif
          </div>
          <div class="row">
              <div class="col-md-3">
                  <a href="url_{{$postz->post_slug}}" class="btn btn-primary btn-block mb-3">View Post</a>
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Post Image</h3>

                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                          </div>
                      </div>
                      <div class="card-body p-0">
                          <ul class="nav nav-pills flex-column">
                              <li class="nav-item">
                                  <img src="posts/{{$postz->post_image}}" style="max-width: 100%" class="img-responsive"/>
                              </li>
                          </ul>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
          <div class="col-xl-9 center-block">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/editPost', array($postz->id)) }}" enctype="multipart/form-data">

                      {{ csrf_field() }}


                      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                              <input id="post_title" type="text" class="form-control" name="post_title" value="{{ $postz->post_title}}" placeholder="Title">

                              @if ($errors->has('post_title'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('post_title') }}</strong>
                                    </span>
                              @endif

                      </div>



                      <div class="form-group{{ $errors->has('post_desc') ? ' has-error' : '' }}">
                          <label for="post_desc" class="col-md-4 control-label">Post  Description</label>


                              <textarea id="post_desc" rows="3" class="form-control" name="post_desc" maxlength="150">{{ $postz->post_desc }}</textarea>

                              @if ($errors->has('post_desc'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('post_desc') }}</strong>
                                    </span>
                              @endif

                      </div>

                      <div class="form-group{{ $errors->has('post_body') ? ' has-error' : '' }}">



                        <textarea id="post_body" name="post_body" class="form-control"> {{ $postz->post_body }}</textarea>

                          @if ($errors->has('post_body'))
                              <span class="help-block">
                                        <strong>{{ $errors->first('post_body') }}</strong>
                                    </span>
                          @endif
                          <script>
                        CKEDITOR.replace( 'post_body' );
                    </script>
                </div>
                      <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                          <label for="category_id" class="col-md-4 control-label">Category</label>

                          <div class="col-md-6">
                              <select id="category_id"  class="form-control" name="category_id" required>

                                  @if($postz->category_id == '0')
                                      <option value="0">No Category</option>
                                  @endif

                                  @foreach($categories->all() as $category)

                                  @if($category->id == $postz->category_id)
                                              <option value="{{$category->id}}">{{$category->category}}</option>
                                              <option value="0">No Category</option>

                                        @endif
                                          @endforeach

                              @foreach($categories->all() as $category)
                                      @if($category->id != $postz->category_id)
                                      <option value="{{$category->id}}">{{$category->category}}</option>
                                       @endif
                                          @endforeach
                              </select>

                              @if ($errors->has('category_id'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                              @endif
                          </div>
                      </div>


                      <div class="form-group{{ $errors->has('post_image') ? ' has-error' : '' }}">
                          <div class="col-md-9">

                          <div class="input-group">
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="post_image" name="post_image">
                                  <label class="custom-file-label" for="post_image">Select Post Image</label>

                                  @if ($errors->has('post_image'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('post_image') }}</strong>
                                    </span>
                                  @endif
                                 </div>

                          </div>
                          <p class="help-block">Max. 500KB</p>
                          </div>
                      </div>

              <div class="card-footer">
                <div class="float-right">
                    <a href="unpublish/{{$postz->id}}" class="btn btn-primary" >Save To Draft</a>
                  <button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i>Update Post</button>
                </div>
              </div>
              <!-- /.card-footer -->
                  </form>
              </div>
            <!-- /. box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('admin.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.js')
</body>
</html>
