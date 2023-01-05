<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//this is for admin profile controller
Route::middleware('auth')->group(function(){
Route::get("/adminDashBoard",[AdminController::class,'index'])->name("admin#index");

//this is admin page
Route::get("/myProfilePage",[AdminController::class,'myProfilePage'])->name('admin#myProfilePage');

//this is password page
Route::get("/passwordPage/{id}",[AdminController::class,"passwordPage"])->name("admin#passwordPage");
Route::post("/updateProfilePassword/{id}",[AdminController::class,"updatePassword"])->name(("admin#updatePassword"));

//this is category page
Route::get("/categoryPage",[CategoryController::class,"index"])->name("admin#categoryPage");
Route::get("/categoryAddPage",[CategoryController::class,"create"])->name("admin#categoryAddPage");
Route::post("/categoryAdd",[CategoryController::class,"store"])->name("admin#categoryAdd");
});










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
