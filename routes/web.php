<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('/order', [PublicController::class, 'welcomeOrder'])->name('welcomeOrder');

Route::get('/categoria/{category}',[PublicController::class, 'categoryShow'])->name('categoryShow');
Route::get('/new/announcement',[AnnouncementController::class, 'createAnnouncement'])->name('createAnnouncement');
Route::get('/new/announcement/success',[AnnouncementController::class, 'successAnnouncement'])->name('successAnnouncement');
Route::get('/dettaglioAnnuncio/{announcement}',[AnnouncementController::class, 'detailAnnouncement'])->name('detailAnnouncement');
Route::get('/all/announcements',[AnnouncementController::class, 'allAnnouncement'])->name('allAnnouncement');


// REVISOR HOME
Route::get('/revisor/home',[RevisorController::class,'index'])->middleware('isRevisor')->name('revisorIndex');
// accetta annuncio
Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class,'acceptAnnouncement'])->middleware('isRevisor')->name('accept_announcement');
// rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}',[RevisorController::class,'rejectAnnouncement'])->middleware('isRevisor')->name('reject_announcement');
// btn diventare revisore
Route::get('/richiesta/revisore',[RevisorController::class,'becomeRevisor'])->middleware('auth')->name('become');
// rendi revisore
Route::get('/rendi/revisore/{user}',[RevisorController::class,'makeRevisor'])->name('make');
// ricerca annuncio
Route::get('/ricerca/annuncio', [PublicController::class, 'searchAnnouncements'])->name('search');
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale');
