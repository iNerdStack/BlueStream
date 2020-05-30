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

                @if(count($searchcomments) > 0)
                    <!-- {{ $sn = 0 }} -->
                    @foreach($searchcomments as $comment)
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

                    {{$searchcomments->links('layouts.paginate')}}

                </ul></div>

        </div>
        <button type="submit" class="btn btn-sm btn-danger float-right" name="delete" value="delete">
            Delete
        </button>

        <button type="submit" class="btn btn-sm btn-success" name="approve" value="approve">
            Approve
        </button>

        <button type="submit" class="btn btn-sm btn-dark" name="unapprove" value="unapprove">
            Unapprove
        </button>
    </div>
    <!-- /.card-footer -->
</form>
         