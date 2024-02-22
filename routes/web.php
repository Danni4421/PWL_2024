<?php

use Illuminate\Support\Facades\Route ;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
 | Basic Routing
 | 
 | For specific information: 
 | https://laravel.com/docs/10.x/routing#main-content 
 */
Route::get('/', function () {
    return 'Selamat Datang';
});

Route::get('/about', function () {
    return ( 
        "<div>
            <h1>NIM: 2241720155</h1>
            <h2>Nama: Aji Hamdani Ahmad</h2>
        </div>"
    );
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

/*
 | Route Parameters 
 | 
 | For specific information:
 | https://laravel.com/docs/10.x/routing#route-parameters
 */
Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}',
    function ($postId, $commentId) {
        return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
    }
);

Route::get('/articles/{id}', function ($articleId) {
    return 'Halaman Artikel dengan ID ' . $articleId;
});

/*
 | Optional Parameters
 |
 | For specific information:
 | https://laravel.com/docs/10.x/routing#parameters-optional-parameters
 */
Route::get('/user/{name?}', function ($name='Aji Hamdani Ahmad') {
    return 'Nama saya ' . $name;
});

/*
 | Named Routes
 | 
 | For specific explanation:
 | https://laravel.com/docs/10.x/routing#named-routes
 */

Route::get('/user/profile', function () {
    //
})->name('profile');

Route::get(
    '/user/profile',
    [UserProfileController::class, 'show']
)->name('profile');

// Generating URL
$url = route('profile');

/*
 | Route Group and Route Prefixes 
 |
 | For specific explanation:
 | https://laravel.com/docs/10.x/routing#route-groups
 | https://laravel.com/docs/10.x/routing#route-group-prefixes
 */
Route::middleware(['first', 'second'])->group(function () {
    // It can contain more than one 

    Route::get('/', function () {
        //
    });
    
    Route::get('/user/profile', function () {
        //
    });

    Route::domain('{acount}.exapmle.com')->group(function () {
        Route::get('user/{id}', function ($account, $id) {
            //
        });
    });
});

/*
 | Route Middleware
 | 
 | Selecting middleware in App\Http\Middleware\Kernel.php
 | and see the middleware aliases 
 |
 | For specific information: 
 | https://laravel.com/docs/10.x/routing#route-group-middleware
 */
Route::middleware('auth')->group(function () {
    Route::get('/user', function () {});
    // Route::get('/admin', [AdminController::class, 'index']); -> for another example of using route
});

/*
 | Route Prefixes
 | 
 | For more information: 
 | https://laravel.com/docs/10.x/routing#route-group-prefixes 
 */
Route::prefix('admin')->group(function () {
    Route::get('/user', function () {});
    Route::get('/post', function () {});
});

/*
 | Route Redirects
 | 
 |  Route::redirect(origin, destination);
 |
 | For more information: 
 | https://laravel.com/docs/10.x/routing#redirect-routes 
 */
Route::redirect('/here', '/there');

/*
 | Views Route
 |
 | For more information: 
 | https://laravel.com/docs/10.x/routing#view-routes
 */
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);