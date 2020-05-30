<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;


class CategoryController extends Controller
{
    //

    public function category()
    {
        $category = Category::orderBy('created_at','desc')->paginate(10);

        return view('categories.category',['categories' => $category]);

    }


    public function addCategory(Request $request)
    {

        $caturl = "";

         // We will handle the error display ourselves
        $messsages = array(
            'category.required'=>'Category Name is required',
            'cat_image.required'=>'Category Image is required',
            'cat_image.mime'=>'You Uploaded an Invalid File',
            'cat_image.max'=>'The Image is Too Large(Max: 600kb)',
        );

        $rules = array(
            'category' => 'required',
            'cat_image' => 'mimes:jpeg,jpg,png|required|max:800'
        );

        $this->validate($request, $rules, $messsages);



        $checkcat = Category::where('category',  $request->input('category'))->count();

        if($checkcat > 0)
        {
            return redirect('/add-category')->with('response', 'Category Already Exists');

        }
        else
        {
            $category = new Category;
            $category->category = $request->input('category');

            if(Input::hasFile('cat_image')) {

                $file = Input::file('cat_image');

                $ext = strtolower($file->getClientOriginalExtension());

                $caturl = str_random(16).'_'.date('mdYHis').'.'.$ext;


                $img = Image::make($request->file('cat_image')->getRealPath());

  //                  $img->fit(500, 500); Draws the Image to Fit the Size

                $img->resize(700, 700); // Resize the Actual Picture


                $img->save(public_path() . '/posts/category/'. $caturl);


                $category->image_url = $caturl;

            }



            $category->save();
            return redirect('/add-category')->with('response', 'Category Added Successfully');

        }


    }





    public function deleteCategory(Request $request)
    {

        // We will handle the error display ourselves
        $messsages = array(
            'category.required'=>'Category Name is required'
        );

        $rules = array(
            'category' => 'required'
        );

        $this->validate($request, $rules, $messsages);

        $checkcat = Category::where('category',  $request->input('category'))->count();


        $cat = Category::where('category', '=',  $request->input('category'))->get()->first();


        if($checkcat > 0)
        {


            Category::where('category', $request->input('category'))
                ->delete();



            File::delete(public_path() . '/posts/category/'. $cat->image_url);


            return redirect('/category')->with('response', 'Category Deleted Successfully');

        }
        else
        {
            return redirect('/deleteCategory')->with('response', 'Category Does Not Exists');

        }
    }






    public function comment(Request $request, $post_id)
    {

        if(Auth::user())
        {
            $this->validate($request,[
                'comment' =>'required'
            ]);

            $comment = new Comment;
            $comment->user_id = Auth::user()->id;
            $comment->name = Auth::user()->name;
            $comment->post_id = $post_id;
            $comment->isAdmin = 1;
            $comment->isCommentApproved = 1;
            $comment->comment = $request->input('comment');
            $comment->save();
            return redirect("/view/{$post_id}")->with('response','Comment Added Successfully');

        }
        else
        {
            $this->validate($request,[
                'comment' =>'required',
                'name' => 'required'
            ]);

            $comment = new Comment;
            $comment->name = $request->input('name');
            $comment->user_id = 0;
            $comment->post_id = $post_id;
            $comment->comment = $request->input('comment');
            $comment->save();
            return redirect("/view/{$post_id}")->with('response','Comment Added Successfully. Your Comment Is Awaiting Approval.');

        }
    }

}

