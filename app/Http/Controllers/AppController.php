<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Category;
use App\Post;
use App\Profile;
use App\Like;
use App\Dislike;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Auth;
use App\Comment;
use Illuminate\Support\Facades\DB;


class AppController extends Controller
{
    //Controls Request to App
    public function AppHome($page)
    {
        $PageTrim = $page * 20;

        $posts = Post::take(20)->
        skip($PageTrim)->get();
        return response()->json(['home'=>$posts]);
    }

    public function AppPostComments($page)
    {
        $PageTrim = $page * 20;

        $comments = Comment::where('post')->take(20)->
        skip($PageTrim)->get();

        return response()->json(['home'=>$comments]);

    }

    public function AppCategory($page)
    {
        $PageTrim = $page * 20;

        $category = Category::take(20)->skip($PageTrim)->get();

         return response()->json(['category'=>$category]);

    }

    public function AppSearchJSON(Request $request)
    {
        $data = Input::all(); //$data = $request->json()->all(); should also work

        return $data['id'];

        // $order = new order();
       // $order->product_int = $data['products'];
       // $order->save();
    }


    public function AppCategoryPosts($category_id, $pages)
    {
        $PageTrim = $pages * 20;

        $categorypost = Post::where('category_id', '=', $category_id)->take(20)->skip($PageTrim)->get();

        return response()->json(['categoryposts'=>$categorypost]);

    }
    public function AppSearch($search, $page)
    {

        $PageTrim = $page * 20;

        $decsearch = urldecode($search);

        $posts = Post::where('post_title', 'LIKE', '%'.$decsearch.'%')
            ->take(20)
            ->skip($PageTrim)
            ->get();

        return response()->json(['result'=>$posts]);

    }


    public function SinglePost($page)
    {

        $post = Post::where('id','=', $page)->get()->first();

        return response()->json(['result'=>$post]);

    }
    public function InvalidSearch($search)
    {
        return view('errors.404');
    }

}
