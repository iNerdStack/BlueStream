<?php


/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


    // App Routes Goes Here

    Route::get('/app/home/{page}', 'AppController@AppHome');
    Route::get('/app/post/{page}', 'AppController@SinglePost');

    Route::post('/app/searchs', 'AppController@AppSearchJSON');

    Route::get('/app/category/{page}', 'AppController@AppCategory');
    Route::get('/app/category/posts/{category_id}/{page}', 'AppController@AppCategoryPosts');


    Route::get('/app/search/{search}/{page}', 'AppController@AppSearch');


    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');



    Route::group(['middleware' => ['web']], function () {
        Route::auth();

    Route::get('/logout', 'HomeController@logout');


    //Admin

    Route::get('/dashboard', 'AdminController@index')->middleware('auth');
    Route::get('/categories', 'AdminController@Categories')->middleware('auth');
    Route::post('/PostAction', 'AdminController@postAction')->middleware('auth');
    Route::post('/DraftAction', 'AdminController@draftAction')->middleware('auth');
    Route::post('/CommentAction', 'AdminController@commentAction')->middleware('auth');
    Route::post('/CategoryAction', 'AdminController@categoryAction')->middleware('auth');
    Route::get('/publish/{id}', 'AdminController@publishPost')->middleware('auth');
    Route::get('/unpublish/{id}', 'AdminController@unpublishPost')->middleware('auth');
    Route::get('/delete/category/{id}', 'AdminController@deleteCategory')->middleware('auth');
    Route::get('new-post', 'AdminController@NewPost')->middleware('auth');
    Route::post('/addPost', 'AdminController@addPost')->middleware('auth');
    Route::get('/edit_{id}', 'AdminController@edit')->middleware('auth');
    Route::get('/url_{post_slug}', 'AdminController@view');
    Route::get('/all-posts', 'AdminController@AllPosts')->middleware('auth');
    Route::get('/all-drafts', 'AdminController@AllDrafts')->middleware('auth');
    Route::get('/all-comments', 'AdminController@AllComments')->middleware('auth');
    Route::get('/approve/{id}', 'AdminController@ApproveComment')->middleware('auth');
    Route::get('/unapprove/{id}', 'AdminController@UnApproveComment')->middleware('auth');
    Route::get('/add-category', 'AdminController@AddCategory')->middleware('auth');
    Route::get('/admin-search', 'AdminController@Search')->middleware('auth');
    Route::post('/adminsearch', 'AdminController@AdminSearch')->middleware('auth');
    Route::get('/adminsearch', function (){return redirect('/admin-search');})->middleware('auth');


    //Post
    Route::get('/post', 'PostController@post')->middleware('auth');
    Route::post('/editPost/{id}', 'PostController@editPost')->middleware('auth');
    Route::get('/delete/{id}', 'PostController@deletePost')->middleware('auth');
    Route::post('/comment/{id}', 'PostController@comment');
    Route::get('delete/comment/{id}', 'PostController@deleteComment')->middleware('auth');


    //Category

    Route::get('/category', 'CategoryController@category');
    Route::post('/addCategory', 'CategoryController@addCategory')->middleware('auth');
    Route::get('/deleteCategory', 'CategoryController@RemoveCategory')->middleware('auth');
    Route::post('/category/delete', 'CategoryController@deleteCategory')->middleware('auth');
    Route::get('/category-{id}', 'PostController@category');

    //Others
    Route::post('/search', 'PostController@search');
    Route::get('/search', 'PostController@search');


});
