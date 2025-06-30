<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('page')->group(function () {
    Route::get('home', [App\Http\Controllers\Api\PageController::class, 'getHomePage']);
    Route::get('about', [App\Http\Controllers\Api\PageController::class, 'getAboutPage']);
    Route::get('why-us', [App\Http\Controllers\Api\PageController::class, 'getWhyUsPage']);
    Route::get('team', [App\Http\Controllers\Api\PageController::class, 'getTeamPage']);
    Route::get('publication', [App\Http\Controllers\Api\PageController::class, 'getPublicationPage']); 
    Route::get('approach', [App\Http\Controllers\Api\PageController::class, 'getApproachPage']); 
    Route::get('contact', [App\Http\Controllers\Api\PageController::class, 'getContactPage']); 
});

Route::post('contact', [App\Http\Controllers\Api\ContactController::class, 'store']);
