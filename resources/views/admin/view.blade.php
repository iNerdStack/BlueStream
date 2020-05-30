<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$post->post_title}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
 @include('admin.css')



</head>
<body>
<div class="wrapper">
  <!-- Navbar -->

  <!-- Content Wrapper. Contains page content -->
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

          <div class="col-md-3">
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
                  @if(Auth::user())
                  <a href="edit_{{$post->id}}" class="btn btn-primary btn-block mb-3">Edit Post</a>
                  @endif
                  <div class="card">

                      <div class="card-body p-0">

                                  <img src="posts/{{$post->post_image}}" style="max-width: 100%" class="img-responsive"/>


                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
              <div class="col-md-9">
                  <div class="card card-primary card-outline">
                      <div class="card-header" align="center">
                          <h2 class="card-title">{{$post->post_title}}</h2>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                          <div class="mailbox-read-info">
                                  <span class="mailbox-read-time float-right">{{$post->created_at}}</span>
                              <br>
                          </div>

                          <!-- /.mailbox-controls -->
                          <div class="mailbox-read-message">
                              {!! $post->post_body !!}

                          </div>

                      </div>
                      <!-- /.card-footer -->
                      <div class="card-footer">
                          <div class="float-right">



                         </div>
                          @if (Auth::user())
                          <a  href="delete/{{$post->id}}"  onClick="javascript: return confirm('Are You Sure You Want To Delete Post');" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete Post</a>
                           @endif
                      </div>
                      <!-- /.card-footer -->
                  </div>
                  <!-- /. box -->
                  <div class="row">
                  <div class="col-md-6">
                  <div class="card-footer card-comments">
                      <div class="card-header">
                          <h3 class="card-title">Comments</h3>
                      </div>
                      @if(count($comments) > 0)
                          @foreach($comments as $comment)
                              @if($comment->isCommentApproved == 1)
                                  <div class="card-comment">

                                      <img class="img-circle img-sm" src="others/dist/img/avatar.png" alt="Avatar">

                                      <div class="comment-text">
                    <span class="username">

                       @if ($comment->isAdmin == '1')
                            {{$comment->name}}(Admin)
                        @else
                            {{$comment->name}}
                        @endif
                      <span class="text-muted float-right">{{$comment->created_at}}</span>
                    </span>
                                          {{$comment->comment}}
                                      </div>
                                      @if (Auth::user())
                                          <a  href="delete/comment/{{$comment->id}}"  onClick="javascript: return confirm('Are You Sure You Want To Delete Comment');" class="float-right"><i class="fa fa-remove"></i></a>
                                      @endif
                                  </div>
                              @endif
                          @endforeach
                      @endif
                      {{$comments->links('layouts.paginate')}}

                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="card card-comments">
                      <div class="card-header">
                          <h3 class="card-title">Comment</h3>
                      </div>
                      <div class="card-body">
                          <form method="POST" action="{{url("/comment/{$post->id}")}}">
                              {{csrf_field()}}

                              <div class="input-group mb-3">

                                  @if (Auth::user())

                                      <input type="hidden" name="email" id="email" value="admin@admin.com"/>
                                  @else
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                      </div>
                                      <input type="email" name="email" id="email" class="form-control" placeholder="Email" required/>

                                  @endif


                          </div>

                          <div class="input-group mb-3">
                              <textarea class="form-control" name="comment" id="comment" placeholder="Type Your Comment Here...." required></textarea>
                          </div>

                          <button type="submit" name="submit" id="submit" class="btn btn-default float-right"><i class="fa fa-paper-plane"></i> Post</button>
                          </form>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  </div>
                  </div>
              </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
 @include('admin.footer')
  </div>
</div>
<!-- ./wrapper -->

@include('admin.js')
</body>
</html>
