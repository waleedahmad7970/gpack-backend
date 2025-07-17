<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/test', function () {
    return 'Test route working!';
});

Route::get('/clear-all', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Application caches cleared!";
});

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
    // fields
    Route::resource('fields', App\Http\Controllers\Admin\FieldController::class)->names([
        'index'   => 'admin.fields.index',
        'create'  => 'admin.fields.create',
        'store'   => 'admin.fields.store',
        'show'    => 'admin.fields.show',
        'edit'    => 'admin.fields.edit',
        'update'  => 'admin.fields.update',
        'destroy' => 'admin.fields.delete',
    ]);
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
    // publications
    Route::resource('publications', App\Http\Controllers\Admin\PublicationController::class)->names([
        'index'   => 'admin.publications.index',
        'create'  => 'admin.publications.create',
        'store'   => 'admin.publications.store',
        'show'    => 'admin.publications.show',
        'edit'    => 'admin.publications.edit',
        'update'  => 'admin.publications.update',
        'destroy' => 'admin.publications.delete',
    ]);
    // pages
    Route::prefix('pages')->group(function () {
        Route::get('home', [App\Http\Controllers\Admin\PageController::class, 'homePageEdit'])->name('admin.pages.home.edit');
        Route::put('home/{home}', [App\Http\Controllers\Admin\PageController::class, 'homePageUpdate'])->name('admin.pages.home.update');
        Route::delete('home-image/{home}', [App\Http\Controllers\Admin\PageController::class, 'deletehomePageBannerImage']);
        Route::get('about', [App\Http\Controllers\Admin\PageController::class, 'aboutPageEdit'])->name('admin.pages.about.edit');
        Route::put('about/{about}', [App\Http\Controllers\Admin\PageController::class, 'aboutPageUpdate'])->name('admin.pages.about.update');
        Route::get('whyus', [App\Http\Controllers\Admin\PageController::class, 'whyUsPageEdit'])->name('admin.pages.why.edit');
        Route::put('whyus/{whyus}', [App\Http\Controllers\Admin\PageController::class, 'whyUsPageUpdate'])->name('admin.pages.why.update');
        Route::delete('whyus-image/{whyus}', [App\Http\Controllers\Admin\PageController::class, 'deleteWhyPageImage']);
        Route::get('team', [App\Http\Controllers\Admin\PageController::class, 'teamPageEdit'])->name('admin.pages.team.edit');
        Route::put('team/{team}', [App\Http\Controllers\Admin\PageController::class, 'teamPageUpdate'])->name('admin.pages.team.update');
        Route::get('publication', [App\Http\Controllers\Admin\PageController::class, 'publicationPageEdit'])->name('admin.pages.publication.edit');
        Route::put('publication/{publication}', [App\Http\Controllers\Admin\PageController::class, 'publicationPageUpdate'])->name('admin.pages.publication.update');
    });
    // support
    Route::prefix('support')->group(function () {
        Route::get('new', [App\Http\Controllers\Admin\SupportController::class, 'index'])->name('admin.support.index');
        Route::get('getNewMessages', [App\Http\Controllers\Admin\SupportController::class, 'getNewMessages']);
        Route::get('/{support}/details', [App\Http\Controllers\Admin\SupportController::class, 'show'])->name('admin.support.show');
        Route::get('log', [App\Http\Controllers\Admin\SupportController::class, 'log'])->name('admin.support.log');
        Route::get('getAllMessages', [App\Http\Controllers\Admin\SupportController::class, 'getAllMessages']);
    });
    // password
    Route::get('password', [App\Http\Controllers\Admin\PasswordController::class, 'create'])->name('admin.password.create');
    Route::post('password', [App\Http\Controllers\Admin\PasswordController::class, 'store'])->name('admin.password.store');
    // social media links
    Route::resource('socials', App\Http\Controllers\Admin\SocialMediaController::class)->names([
        'index'   => 'admin.socials.index',
        'update'  => 'admin.socials.update',
    ]);
    // contact
    Route::get('contact-info', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('admin.contacts.index');
    Route::put('contact-info/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'update'])->name('admin.contacts.update');
    // admins
    Route::resource('admins', App\Http\Controllers\Admin\AdminController::class)->names([
        'index'   => 'admin.admins.index',
        'create'  => 'admin.admins.create',
        'store'   => 'admin.admins.store',
        'show'    => 'admin.admins.show',
        'edit'    => 'admin.admins.edit',
        'update'  => 'admin.admins.update',
        'destroy' => 'admin.admins.delete',
    ]);
});