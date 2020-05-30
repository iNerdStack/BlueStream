<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;
use App\User;
use Auth;
use App\Post;
use Illuminate\Support\Facades\Schema;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function logout()
    {

        Auth::logout();
        Session::flush();
        return redirect('/home')->with('response', 'You were logged out');


    }

    public function index()
    {


        if (Schema::hasTable('posts'))
        {

            if (Schema::hasTable('users')) {

                $posts = Post::where('isPostPublished','=', 1)->paginate(10);


                return view('home.homegrid', ['posts' => $posts]);

            }
            else {

                return view('errors.site');
            }

        }
        else
        {

            return view('errors.site');

        }





    }
}
