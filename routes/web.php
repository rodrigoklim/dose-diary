<?php

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
  return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::prefix('/my-account')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::get('{url}', function ($url) {
      if (in_array($url, ['edit-personal-info', 'edit-contact-info', 'change-password'])) {
        return app(ProfileController::class)->edit(request(), $url);
      }

      return abort(404);
    });

    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
  });
});

require __DIR__ . '/auth.php';
