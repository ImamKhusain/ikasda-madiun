<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\OrganizationalController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RecruitmentController;
use App\Livewire\Navigation;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/pojok-ilmiah', [PostController::class, 'index'])->name('posts.index');
Route::get('/pojok-ilmiah/{category:slug}', [PostController::class, 'detail'])->name('posts.detail');
Route::get('/pojok-ilmiah/{category:slug}/{post:slug}', [PostController::class, 'show'])
    ->name('posts.show')
    ->withoutScopedBindings();

Route::get('/abouts/{organizational:slug}', [OrganizationalController::class, 'show'])->name('abouts.show');

Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('merchandise.index');
Route::get('/merchandise/{merchandise:slug}', [MerchandiseController::class, 'show'])->name('merchandise.show');

Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');
Route::get('/alumni/{alumni:slug}', [AlumniController::class, 'show'])->name('alumni.show');
