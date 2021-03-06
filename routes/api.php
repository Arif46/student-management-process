<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'prefix'=>'user',
    'namespace'=>'User',
],
function(){
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
   
    Route::get("student/{id}","AuthController@showstudent");
    Route::delete('studentdelete/{id}','AuthController@studentdelete'); 

}
);

Route::post('course','CourseController@create');
Route::get("course/{id}","CourseController@getcourse");
Route::post('courseUpdate/{id}','CourseController@courseupdate');
Route::delete('coursedelete/{id}','CourseController@coursedelete'); 