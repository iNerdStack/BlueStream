<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Auth;
use App\Comment;
use Carbon\Carbon;

class PostController extends Controller
{
    public function post()
    {
        $category = Category::all();

        return view('posts.post',['categories' => $category]);

    }





    public function editPost(Request $request,$post_id)
    {

        $this->validate($request,[
            'post_title' => 'required',
            'post_body' => 'required',
            'category_id' => 'required',
        ]);


        $checkifposttitle = POST::where('post_title', '=', $request->input('post_title'))->get()->count();

        if ($checkifposttitle == 0)
        {

            $post_slug = str_slug($request->input('post_title'), '-');

        }
        else
        {

            $postslug = str_slug($request->input('post_title'), '-');

            $post_slug = $postslug. "-".$checkifposttitle;

        }





        $posts = new Post;
        $posts->post_title = $request->input('post_title');
        $posts->post_body = $request->input('post_body');
        $posts->post_slug = $post_slug;


        if($request->input('post_desc') != null)
        {

            $posts->post_desc = $request->input('post_desc');

        }
        else
        {
            $posts->post_desc = "";
        }
        $posts->user_id = Auth::user()->id;
        $posts->category_id = $request->input('category_id');

        if(Input::hasFile('post_image')) {

            $OldImage = Post::where('id', $post_id)->get()->first();

            File::delete(public_path() . '/posts/'. $OldImage->post_image);

            $file = Input::file('post_image');

            $ext = strtolower($file->getClientOriginalExtension());

            $realurl = str_random(16).'_'.date('mdYHis').'.'.$ext;

            $file->move(public_path() . '/posts/', $realurl);

            $posts->post_image = $realurl;

            $data =array(
                'post_title' => $posts->post_title,
                'user_id' => $posts->user_id,
                'post_body' => $posts->post_body,
                'post_desc' => $posts->post_desc,
                'category_id' => $posts->category_id,
                'post_image' => $posts->post_image,
            );



        }
        else
            {
                $data =array(
                    'post_title' => $posts->post_title,
                    'user_id' => $posts->user_id,
                    'post_body' => $posts->post_body,
                    'post_desc' => $posts->post_desc,
                    'category_id' => $posts->category_id
                );
        }


        Post::where('id',$post_id)
            ->update($data);
        $posts->update();
        return redirect('edit_'.$post_id)->with('response', 'Post Updated Successfully');

    }

    public function deletePost($post_id)
 {

     $post = Post::where('id', $post_id)->get()->first();

     File::delete(public_path() . '/posts/'. $post->post_image);

     Comment::where('post_id', $post_id)
         ->delete();

     Post::where('id', $post_id)
         ->delete();

     return redirect('/dashboard')->with('response', 'Post Deleted Successfully');
 }

    public function deleteComment($comment_id)
    {

        Comment::where('id', $comment_id)
        ->delete();

        return redirect('all-comments')->with('response', 'Comment Deleted Successfully');
    }


   public function category($cat_id)
 {
     $categories = Category::all();

     $categoryinfo = Category::where('id', '=', $cat_id)->first();

     $posts = Post::where('category_id', '=', $cat_id)
         ->where('isPostPublished', '=', 1)->paginate("10");

     return view('categories.categoriespost', ['categories' => $categories,'posts' => $posts,
         "categoryinfo" => $categoryinfo
         ]);

 }







       public function comment(Request $request, $post_id)
    {

if(Auth::user())
{
    $this->validate($request,[
        'comment' =>'required'
    ]);

    $post = POST::where('id','=',$post_id)->get()->first();

    $comment = new Comment;
    $comment->user_id = Auth::user()->id;
    $comment->name = Auth::user()->name;
    $comment->post_id = $post_id;
    $comment->isAdmin = 1;
    $comment->isCommentApproved = 1;
    $comment->comment = $request->input('comment');
    $comment->email = $request->input('email');
    $comment->save();
    return redirect("url_{$post->post_slug}")->with('response','Comment Added Successfully');

}
else
    {
        $this->validate($request,[
            'comment' =>'required',
            'email' => 'required'
        ]);


        $post = POST::where('id','=',$post_id)->get()->first();

        $comment = new Comment;
        $comment->name = $request->input('email');
        $comment->user_id = 0;
        $comment->post_id = $post_id;
        $comment->comment = $request->input('comment');
        $comment->email = $request->input('email');
        $comment->save();
        return redirect("_{$post->post_slug}")->with('response','Comment Added Successfully. Your Comment Is Awaiting Approval.');

}
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $posts = Post::where('post_title', 'LIKE', '%'.$keyword.'%')->where('isPostPublished','=', 1)->paginate(10);

        return view('search', ['posts' => $posts,
        ]);
    }

    public function posts()
    {
        return redirect('/home');

    }

    }
