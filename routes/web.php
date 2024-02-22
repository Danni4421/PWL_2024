<?php

use Illuminate\Support\Facades\Route ;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;

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
Route::get('/', [PageController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/hello', [WelcomeController::class,'hello']);

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

Route::get('/articles/{id}', [ArticleController::class, 'index']);

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

// Route::get('/user/profile', function () {
//     //
// })->name('profile');

// Route::get(
//     '/user/profile',
//     [UserProfileController::class, 'show']
// )->name('profile');

// // Generating URL
// $url = route('profile');

/*
 | Route Group and Route Prefixes 
 |
 | For specific explanation:
 | https://laravel.com/docs/10.x/routing#route-groups
 | https://laravel.com/docs/10.x/routing#route-group-prefixes
 */
// Route::middleware(['first', 'second'])->group(function () {
//     // It can contain more than one 

//     Route::get('/', function () {
//         //
//     });
    
//     Route::get('/user/profile', function () {
//         //
//     });

//     Route::domain('{acount}.exapmle.com')->group(function () {
//         Route::get('user/{id}', function ($account, $id) {
//             //
//         });
//     });
// });

/*
 | Route Middleware
 | 
 | Selecting middleware in App\Http\Middleware\Kernel.php
 | and see the middleware aliases 
 |
 | For specific information: 
 | https://laravel.com/docs/10.x/routing#route-group-middleware
 */
// Route::middleware('auth')->group(function () {
//     Route::get('/user', function () {});
//     // Route::get('/admin', [AdminController::class, 'index']); -> for another example of using route
// });

/*
 | Route Prefixes
 | 
 | For more information: 
 | https://laravel.com/docs/10.x/routing#route-group-prefixes 
 */
// Route::prefix('admin')->group(function () {
//     Route::get('/user', function () {});
//     Route::get('/post', function () {});
// });

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

/*
 | Resource Controllers
 | 
 | For more information: 
 | https://laravel.com/docs/10.x/controllers#resource-controllers 
 */
// Route::resource('photos', PhotoController::class);

// Only use route index and show
Route::resource('photos', PhotoController::class)->only(['index', 'show']);

// Use all method's except for create and store
Route::resource('photos', PhotoController::class)->except(['create', 'store']);

/*
 | Displaying from view 
 */
Route::get('/greeting', [WelcomeController::class, 'greeting']);