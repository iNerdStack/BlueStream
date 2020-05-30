
<form class="form-horizontal" role="form" method="POST" action="{{ url('/PostAction') }}" enctype="multipart/form-data">
    {{ csrf_field() }}


    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>

                <tr>
                    <th>
                        <input type="checkbox" id='checkallposts'  />
                    </th>
                    <th>S/N</th>
                    <th>Post Image</th>
                    <th>Title</th>
                    <th>Post Description</th>
                    <th>Task</th>
                </tr>
                </thead>
                <tbody>

                @if(count($searchposts) > 0)
                    <!-- {{ $sn = 0 }} -->
                    @foreach($searchposts as $post)
                        <tr>
                            <td> <span class="button-checkbox">
     <input type="checkbox" name="post[]" class='postcheckbox' value="{{$post->id}}" />
    </span></td>
                            <td>{{$sn = $sn + 1}}</td>
                            <td>
                                <img src="posts/{{$post->post_image}}" height="150px" width="150px"/>
                            </td>
                            <td>{{$post->post_title}}</td>
                            <td>{{$post->post_desc}}</td>

                            <td>
                                <a class="btn btn-sm btn-default" href="_{{$post->post_slug}}"><span class="fa fa-newspaper-o"></span></a>
                                <a class="btn btn-sm btn-default" href="edit_{{$post->id}}"><span class="fa fa-pencil"></span></a>
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

        <nav> <ul class="pagination justify-content-end">

            </ul></nav>
        <div class="float-left">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

                <ul class="pagination">

                    {{$searchposts->links('layouts.paginate')}}

                </ul></div>

        </div>
        <button type="submit" class="btn btn-sm btn-danger float-right" class="btn btn-success" name="delete" value="delete">
            Delete
        </button>
    </div>
    <!-- /.card-footer -->
</form>
