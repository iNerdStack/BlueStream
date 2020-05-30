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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Task</th>
                </tr>
                </thead>
                <tbody>

                @if(count($searchcategories) > 0)
                    <!-- {{ $sn = 0 }} -->
                    @foreach($searchcategories as $category)
                        <tr>
                            <td> <span class="button-checkbox">
     <input type="checkbox" name="category[]" class='categorycheckbox' value="{{$category->id}}" />
    </span></td>
                            <td>{{$sn = $sn + 1}}</td>
                            <td>{{$category->category}}</td>

                            <td>
                                <img src="posts/category/{{$category->image_url}}" height="100px" width="100px"/>
                            </td>

                            <td>
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

        <nav> <ul class="pagination justify-content-end">

            </ul></nav>
        <div class="float-left">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

                <ul class="pagination">

                    {{$searchcategories->links('layouts.paginate')}}

                </ul></div>

        </div>
        <button type="submit" class="btn btn-sm btn-danger float-right" class="btn btn-success" name="delete" value="delete">
            Delete
        </button>
    </div>
    <!-- /.card-footer -->
</form>
         