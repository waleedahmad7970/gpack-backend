<?php

use Illuminate\Support\Facades\Route;

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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('guest.admin')->group(function() {
    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm']);
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login.store');
}); 
Route::middleware('auth.admin')->group(function() {
    Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'getDashboard'])->name('admin.dashboard');
    // teams
    Route::resource('teams', App\Http\Controllers\Admin\TeamController::class)->names([
        'index'   => 'admin.teams.index',
        'create'  => 'admin.teams.create',
        'store'   => 'admin.teams.store',
        'show'    => 'admin.teams.show',
        'edit'    => 'admin.teams.edit',
        'update'  => 'admin.teams.update',
        'destroy' => 'admin.teams.delete',
    ]);
    Route::delete('team-image/{team}', [App\Http\Controllers\Admin\TeamController::class, 'deleteTeamImage']);
    // // password
    // Route::get('password', [App\Http\Controllers\Admin\PasswordController::class, 'create'])->name('admin.password.create');
    // Route::post('password', [App\Http\Controllers\Admin\PasswordController::class, 'store'])->name('admin.password.store');
});