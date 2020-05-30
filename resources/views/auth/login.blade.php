<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign In</title>

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


      <div align="center" style="margin: auto;">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">

                  <div class="panel-body" >
                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
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

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Password</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control" name="password">

                                  @if ($errors->has('password'))
                                      <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      <i class="fa fa-btn fa-sign-in"></i> Login
                                  </button>
                                  <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

        @include('admin.footer')
    </div>
</div>
<!-- ./wrapper -->

@include('admin.js')
</body>
</html>
