<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Common;

class AdminController extends Controller
{

    public function index()
    {

        $posts = Post::where('IsPostPublished', '=', '1')->get();
        $drafts = Post::where('IsPostPublished', '=', '0')->get();
        $comments = Comment::all();
        $categories = Category::all();

        return view('admin.admin', ['posts' => $posts,
            'comments' => $comments,
            'drafts' => $drafts,
            'categories' => $categories,
        ]);
    }


    public function draftAction(request $request )
    {

        $drafts = $request->input('draft');


        if ($drafts == null) {

            return redirect('/all-drafts')->with('response', 'Select at least one post in draft');

        }


        if ($request->has('publish')) {

            foreach ($drafts as $post) {

                $data = (
                [
                    'IsPostPublished' => '1'
                ]
                );


                POST::where('id', '=', array($post))->update($data);

            }

            return redirect('/all-drafts')->with('response', 'Post(s) published successfully');

        } else if ($request->has('delete')) {

            $s = 0;


            foreach ($drafts as $post) {


                $getpost = POST::where('id', '=', array($post))->get()->first();

                File::delete(public_path() . '/posts/' . $getpost->post_image);

                Comment::where('post_id', array($post))
                    ->delete();

                Post::where('id', array($post))
                    ->delete();


            }

            return redirect('/all-drafts')->with('response', 'Post(s) Deleted Successfully');

        }

    }

    public function unpublishPost($id)
    {

        $data = (
        [
            'IsPostPublished' => '0'
        ]
        );

        Post::where('id', '=', $id)->update($data);

        return redirect('/all-drafts')->with('response', 'Post Unpublished');

    }


    public function publishPost($id)
    {

        $data = (
        [
            'IsPostPublished' => '1'
        ]
        );

        Post::where('id', '=', $id)->update($data);

        return redirect('/all-posts')->with('response', 'Post Published');

    }

    public function UnApproveComment($id)
    {

        $data = (
        [
            'isCommentApproved' => '0'
        ]
        );

        Comment::where('id', '=', $id)->update($data);

        return redirect('/all-comments')->with('response', 'Comment UnApproved');

    }

    public function ApproveComment($id)
    {

        $data = (
        [
            'isCommentApproved' => '1'
        ]
        );

        Comment::where('id', '=', $id)->update($data);

        return redirect('/all-comments')->with('response', 'Comment Approved');

    }

    public function postAction(request $request)
    {

                  $posts = $request->input('post');


            if ($posts == null) {

                return redirect('/all-posts')->with('response', 'Select at least one post');

            }


            if ($request->has('unpublish')) {

                foreach ($posts as $post) {

                    $data = (
                    [
                        'IsPostPublished' => '0'
                    ]
                    );


                    POST::where('id', '=', array($post))->update($data);

                }

                return redirect('/all-drafts')->with('response', 'Post(s) unpublished successfully');

            } else if ($request->has('delete')) {

                $s = 0;


                foreach ($posts as $post) {


                    $getpost = POST::where('id', '=', array($post))->get()->first();

                    File::delete(public_path() . '/posts/' . $getpost->post_image);

                    Comment::where('post_id', array($post))
                        ->delete();

                    Post::where('id', array($post))
                        ->delete();


                }

                return redirect('/all-posts')->with('response', 'Post(s) Deleted Successfully');

        }

    }

    public function commentAction(request $request)
    {

        $comments = $request->input('comment');


        if ($comments == null) {

            return redirect('/all-comments')->with('response', 'Select at least one comment');

        }


        if ($request->has('approve')) {

            foreach ($comments as $comment) {

                $data = (
                [
                    'IsCommentApproved' => '1'
                ]
                );


                Comment::where('id', '=', array($comment))->update($data);

            }

            return redirect('/all-comments')->with('response', 'Comment(s) approved successfully');

        }
        else if ($request->has('unapprove')) {

            foreach ($comments as $comment) {

                $data = (
                [
                    'IsCommentApproved' => '0'
                ]
                );


                Comment::where('id', '=', array($comment))->update($data);

            }

            return redirect('/all-comments')->with('response', 'Comment(s) has been unapproved successfully');

        }
        else if ($request->has('delete')) {

            $s = 0;

            foreach ($comments as $comment) {

                $getcomment = Comment::where('id', '=', array($comment))->get()->first();

                Comment::where('id', array($comment))
                    ->delete();

            }

            return redirect('/all-comments')->with('response', 'Comment(s) Deleted Successfully');

        }

    }

    public function deleteCategory($id)
    {

        $cat = Category::where('id', $id)->get()->first();

        if (empty($cat)) {

            return redirect('/categories')->with('response', 'Category Already Deleted Or Does Not Exist');

        }

        $data = (
        [
            'category_id' => '0'
        ]
        );


        POST::where('category_id', '=', $cat->id)->update($data);


        File::delete(public_path() . '/posts/category/' . $cat->image_url);


        Category::where('id', $id)
            ->delete();

        return redirect('/categories')->with('response', 'Category Deleted Successfully');


    }

    public function view($post_slug)
    {

        //Proper way to save time
        // carbon::now()->toDayDateTimeString();
        $posts = Post::where('IsPostPublished', '=', '1')->get();
        $drafts = Post::where('IsPostPublished', '=', '0')->get();
        $comments = Comment::all();
        $categories = Category::paginate(3);

        $post = POST::where('post_slug', '=', $post_slug)->get()->first();


        if(!POST::where('post_slug', '=', $post_slug)->count() > 0)
        {

            return view('errors.404');

        }


        if($post->IsPostPublished == 0 && Auth::user() == null)
        {

            return view('errors.404');

        }


        $comments = Comment::where('post_id', '=', $post->id)->paginate(10);


        $categories = Category::all();


        return view('admin.view', ['post' => $post, 'posts' => $posts,
            'categories' => $categories,
            'drafts' => $drafts,
            'comments'=>$comments
        ]);

    }

    public function Categories()
    {

        $posts = Post::where('IsPostPublished', '=', '1')->get();
        $drafts = Post::where('IsPostPublished', '=', '0')->get();
        $comments = Comment::all();

       $categories = Category::paginate(15);

        return view('admin.categories', ['posts' => $posts,
            'comments' => $comments,
            'drafts' => $drafts,
            'categories' => $categories,
        ]);

    }


    public function AllPosts()
    {

        $posts = Post::where('IsPostPublished', '=', '1')->get();
        $drafts = Post::where('IsPostPublished', '=', '0')->get();
        $comments = Comment::all();
        $allposts = Post::where('IsPostPublished', '=', '1')->paginate(15);

        return view('admin.posts', ['posts' => $posts,
            'comments' => $comments,
            'drafts' => $drafts,
            'allposts' => $allposts,
        ]);

    }

    public function AllDrafts()
    {

        $posts = Post::where('IsPostPublished', '=', '1')->get();
        $drafts = Post::where('IsPostPublished', '=', '0')->get();
        $comments = Comment::all();
        $alldrafts = Post::where('IsPostPublished', '=', '0')->paginate(15);

        return view('admin.drafts', ['posts' => $posts,
            'comments' => $comments,
            'drafts' => $drafts,
            'alldrafts' => $alldrafts,
        ]);

    }

    public function AllComments()
    {

        $posts = Post::where('IsPostPublished', '=', '1')->get();
        $drafts = Post::where('IsPostPublished', '=', '0')->get();
       $NotApprovedComments = Comment::where('IsCommentApproved', '=', '0')->paginate(5);
        $comments = Comment::paginate('10');

        return view('admin.comments', ['posts' => $posts,
            'comments' => $comments,
            'drafts' => $drafts,
            'NotApprovedComments' => $NotApprovedComments
        ]);

    }

    public function categoryAction(request $request)
    {

        $categories = $request->input('category');


        if ($categories == null) {

            return redirect('/categories')->with('response', 'Select at least one category');

        }


        foreach ($categories as $category) {

    $getimage = Category::where('id', '=', $category)->first();

            Category::where('id', $category)
                ->delete();


            $data = (
            [
                'category_id' => '0'
            ]
            );


            POST::where('category_id', '=', $category)->update($data);


            File::delete(public_path() . '/posts/category/' . $getimage->image_url);


        }


        return redirect('/categories')->with('response', 'Deleted successfully');


    }

    public function NewPost()
    {


        $posts = Post::where('IsPostPublished', '=', '1')->get();
        $drafts = Post::where('IsPostPublished', '=', '0')->get();
        $comments = Comment::all();
        $categories = Category::paginate(10);

        return view('admin.post', ['posts' => $posts,
            'comments' => $comments,
            'drafts' => $drafts,
            'categories' => $categories,
        ]);
    }

    public function Search()
    {
        $posts = Post::where('IsPostPublished', '=', '1')->get();
        $drafts = Post::where('IsPostPublished', '=', '0')->get();
        $comments = Comment::all();
        $categories = Category::all();

        return view('admin.search.search', ['posts' => $posts,
            'comments' => $comments,
            'drafts' => $drafts,
            'categories' => $categories,
            'searchtype' => 'None'
        ]);
    }

    public function AdminSearch(Request $request)
    {
        $posts = Post::where('IsPostPublished', '=', '1')->get();
        $drafts = Post::where('IsPostPublished', '=', '0')->get();
        $comments = Comment::all();
        $categories = Category::all();

        $searchtype = $request->input('search_type');
        $keyword = $request->input('search');


        if ($searchtype == "Post")
        {
            $searchposts = Post::where('post_title', 'LIKE', '%'.$keyword.'%')->paginate('10');


            return view('admin.search.search', ['searchposts' => $searchposts,
                'searchtype' => $searchtype,
            'comments' => $comments,
            'drafts' => $drafts,
            'categories' => $categories,
                'posts' => $posts
            ]);
        }
        else if ($searchtype == "Category")
        {
            $searchcategories = Category::where('category', 'LIKE', '%'.$keyword.'%')->paginate('10');


            return view('admin.search.search', ['searchcategories' => $searchcategories,
                'searchtype' => $searchtype,
                'comments' => $comments,
                'drafts' => $drafts,
                'categories' => $categories,
                'posts' => $posts
            ]);
        }
        else if ($searchtype == "Comment")
        {

            $searchcomments = Comment::where('comment', 'LIKE', '%'.$keyword.'%')->paginate('10');


            return view('admin.search.search', ['searchcomments' => $searchcomments,
                'searchtype' => $searchtype,
                'comments' => $comments,
                'drafts' => $drafts,
                'categories' => $categories,
                'posts' => $posts
            ]);
        }


    }


    public function AddCategory()
    {
        $posts = Post::where('IsPostPublished', '=', '1')->get();
        $drafts = Post::where('IsPostPublished', '=', '0')->get();
        $comments = Comment::all();
        $categories = Category::all();

        return view('admin.category', ['posts' => $posts,
            'comments' => $comments,
            'drafts' => $drafts,
            'categories' => $categories,
        ]);
    }

    public function addPost(Request $request)
    {

        $this->validate($request,[
            'post_title' => 'required',
            'post_body' => 'required',
            'category_id' => 'required',
            'post_image' => 'required',
        ]);



        $checkifposttitle = POST::where('post_title', '=', $request->input('post_title'))->get()->count();



        if ($checkifposttitle == 0)
        {

            $post_slug = str_slug($request->input('post_title'), '-');

        }
        else
        {

            $s = carbon::now()->toDateTimeString();

            $s =   str_replace('-', '', $s);
            $s =   str_replace(' ', '', $s);
            $s =   str_replace(':', '', $s);

            $postslug = str_slug($request->input('post_title'), '-');

            $post_slug = $postslug. "-".$s;

        }




        $posts = new Post;
        $posts->post_title = $request->input('post_title');
        $posts->post_body = $request->input('post_body');
        $posts->post_slug = $post_slug;

        if ($request->has('publish')) {

            $posts->IsPostPublished = 1;

        } else if ($request->has('draft')) {

            $posts->IsPostPublished = 0;

        }


        $posts->user_id = Auth::user()->id;

        if($request->input('post_desc') != null)
        {

            $posts->post_desc = $request->input('post_desc');

        }
        else
        {
            $posts->post_desc = "";
        }


        $posts->category_id = $request->input('category_id');



        if(Input::hasFile('post_image')) {

            $file = Input::file('post_image');

            $ext = strtolower($file->getClientOriginalExtension());

            $realurl = str_random(16).'_'.date('mdYHis').'.'.$ext;

            $file->move(public_path() . '/posts/', $realurl);

        }

        $posts->post_image = $realurl;
        $posts->save();


        if ($request->has('publish')) {

            return redirect('/new-post')->with('response', 'Post Published Successfully');

        } else if ($request->has('draft')) {

            return redirect('/new-post')->with('response', 'Draft Has Been Created Successfully');

        }

    }
    public function edit($post_id)
    {
        $posts = Post::where('IsPostPublished', '=', '1')->get();
        $drafts = Post::where('IsPostPublished', '=', '0')->get();
        $comments = Comment::all();
        $categories = Category::all();
        $postz = Post::find($post_id);
        $category = Category::find($postz->category_id);
        return view('admin.edit', ['categories' => $categories, 'category' => $category, 'posts' => $posts, 'drafts' => $drafts, 'postz' => $postz]);

    }

}