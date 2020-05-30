<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BlueStream - Categories</title>

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
                <div class="container-fluid">

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
                </div>
                <!-- /.container-fluid -->
            </section>

            <section class="content">

                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            @if(count($categories) > 0)
                            @foreach($categories->all() as $category)
                            <div class="col-md-6">

                                <div class="card card-widget">
                                    <img class="img-fluid pad" src="posts/category/{{$category->image_url}}" alt="{{$category->category}}" style="max-height:250px" />
                                    <div class="card-header">
                                        <h4> <a href="{{url("category-{$category->id}")}}">{{$category->category}}</a></h4>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>


                    </div>

                    <div class="col-md-3">
                        <div class="card-tools">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/search') }}" enctype="multipart/form-data">

                                {{csrf_field()}}

                                <div class="input-group input-group-sm">
                                    <input type="text" name="search" id="search" class="form-control float-right" placeholder="Search" required>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

                                </div>
                            </form>
                        </div>


                        <div class="card">

                            <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">

                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                    <div class="p-0" style="text-align: center;margin: auto">

                        <ul class="pagination">

                            {{$categories->links('layouts.paginate')}}

                        </ul>

                    </div>
                    <!-- /.row -->

                </div>

            </section>

            @include('admin.footer')

        </div>

    </div>
    <!-- ./wrapper -->

    @include('admin.js')
</body>

</html>