<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestimonialController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// My custom routes

Route::get('/home', [HomeController::class, "index"])->name("home")->middleware('auth');
Route::get('/',[HomeController::class,'homepage'])->name('homepage');
Route::get('/home/about',[HomeController::class,'about'])->name('frontabout');

Route::get('/home/services',[HomeController::class,'services'])->name('frontservices');
Route::get('/home/blogs',[HomeController::class,'blogs'])->name('frontblogs');
Route::get('/home/contact',[HomeController::class,'contact'])->name('frontcontact');

Route::get('/singlepost/{id}', [HomeController::class, 'show'])->name('singlepostpage');


Route::get("/dashboard", [AdminController::class, 'index'])->name("dashboard")->middleware(["auth", "admin"]);


// Post controller
Route::get('/post/show', [PostController::class, 'index'])->name('show');
Route::get('/post/create', [PostController::class,'create'])->name('create');
Route::post('/post/store',[PostController::class, 'store'])->name('store');
Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('delete');
Route::get('/post/remove/{id}', [PostController::class, 'remove'])->name('remove');
Route::get('/post/trashed', [PostController::class, 'trashed'])->name('trashed');
Route::get('/post/restore/{id}', [PostController::class, 'restore'])->name('restore');
Route::get("/post/edit/{id}", [PostController::class, 'edit'])->name('edit');
Route::post("/post/update/{id}", [PostController::class, 'update'])->name('update');

Route::get("/dashboard/about", [AdminController::class, 'about'])->name('about');
Route::post("/dashboard/updateabout/{id}", [AdminController::class, 'updateAbout'])->name('updateabout');

Route::get("/dashboard/charts/", [AdminController::class, 'charts'])->name('charts');

Route::get("/dashboard/settings/", [AdminController::class, 'setting'])->name('setting');
Route::post("/dashboard/settings/", [AdminController::class, 'updateSetting'])->name('updatesetting');

Route::get("/dashboard/testimonials/", [TestimonialController::class, 'index'])->name('showtesti');
Route::get("/dashboard/testimonials/create/", [TestimonialController::class, 'create'])->name('createtesti');
Route::post("/dashboard/testimonials/store/", [TestimonialController::class, 'store'])->name('storetesti');
Route::get("/dashboard/testimonials/edit/{id}", [TestimonialController::class, 'edit'])->name('edittesti');
Route::post("/dashboard/testimonials/update/{id}", [TestimonialController::class, 'update'])->name('updatetesti');
Route::get("/dashboard/testimonials/delete/{id}", [TestimonialController::class, 'destroy'])->name('deletetesti');

// End of custom routes











Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
