<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//insert route grouping for authentication
Route::get('users/{user_id}/site-assignments', 'App\Http\Controllers\UserSiteAssignmentController@show');

Route::post('users/{user_id}/sign-ons', 'App\Http\Controllers\UserSignonController@store');

Route::get('sites', 'App\Http\Controllers\SiteController@index');

Route::get('sites/{site_id}/sign-ons', 'App\Http\Controllers\SiteSignonController@index');
//end of route grouping

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
