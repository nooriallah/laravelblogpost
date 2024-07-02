<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


// End of custom routes











Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
