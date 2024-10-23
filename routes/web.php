<?php

use App\Http\Controllers\ProfileController;
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
Route::get('/home', function () {
    return view('home');
})->name('home.index');

Route::get('/', function () {
    return view('welcome');
});




Route::get('/contact', function () {
    return view('contact');
})->name('contact.index');

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');

Route::get('/dashboard/contact', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('dashboard.contact.index');

Route::delete('/dashboard/contact/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('dashboard.contact.destroy');




Route::get('/projects', [\App\Http\Controllers\ProjectController::class, 'index'])->name('projects');




//Route::get('/skills', [\App\Http\Controllers\SkillController::class, 'guest'])->name('skills');




Route::resource('dashboard/projects', \App\Http\Controllers\Admin\ProjectController::class);

Route::delete('/dashboard/projects/{id}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('dashboard.projects.destroy');



Route::resource('dashboard/skills', \App\Http\Controllers\Admin\SkillController::class);

Route::delete('/dashboard/skills/{id}', [\App\Http\Controllers\Admin\SkillController::class, 'destroy'])->name('dashboard.skills.destroy');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
