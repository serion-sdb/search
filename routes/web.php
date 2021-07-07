<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Services\Base;
use App\Services\Printer;
use App\Services\Text;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);


Route::group([
    'prefix' => 'instant-search/members',
], function() {

    Route::get('input', function() {
        return view('instant-search');
    });
    
    Route::get('search', 'MemberController@index');

});

