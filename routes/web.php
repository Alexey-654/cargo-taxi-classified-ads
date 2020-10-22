<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\AdFeedbackFormsController;
use App\Http\Controllers\AdminFormsController;
use App\Models\Ad;
use App\Models\Feedback;
use Illuminate\Http\Request;

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
    $ads = Ad::getAds();
    $feedbacks = Feedback::getFeedBacks();
    return view('main', compact('ads', 'feedbacks'));
})->name('main');

Route::get('/ads', [AdsController::class, 'index'])->name('ads.index');
Route::get('/ads/create', [AdsController::class, 'create'])->name('ad.create');
Route::post('/ads/create', [AdsController::class, 'store'])->name('ad.store');
Route::get('/ads/{id}/edit', [AdsController::class, 'edit'])->name('ad.edit');
Route::get('/ads/{id}', [AdsController::class, 'show'])->name('ad.show');
Route::patch('/ads/{id}', [AdsController::class, 'update'])->name('ad.update');
Route::delete('/ads/{id}', [AdsController::class, 'destroy'])->name('ad.destroy');

Route::get('/feed', [AdFeedbackFormsController::class, 'index'])->name('feed.index');
Route::post('/feed/create', [AdFeedbackFormsController::class, 'store'])->name('feed.store');


Route::get('/perevozka-mebeli', function () {
    $ads = Ad::getAds();
    $feedbacks = Feedback::getFeedBacks();
    return view('perevozka-mebeli', compact('ads', 'feedbacks'));
});

Route::get('/personal', function () {
    $ads = Ad::getAds();
    $feedbacks = Feedback::getFeedBacks();
    return view('personal', compact('ads', 'feedbacks'));
});

Route::get('/pereezdy', function () {
    $ads = Ad::getAds();
    $feedbacks = Feedback::getFeedBacks();
    return view('pereezdy', compact('ads', 'feedbacks'));
});

Route::get('/carrying', function () {
    $ads = Ad::getAds();
    $feedbacks = Feedback::getFeedBacks();
    return view('carrying', compact('ads', 'feedbacks'));
});

Route::get('/gruzchiki', function () {
    $ads = Ad::getAds();
    $feedbacks = Feedback::getFeedBacks();
    return view('gruzchiki', compact('ads', 'feedbacks'));
});

Route::post('/to-admin', [AdminFormsController::class, 'store']);

Route::view('/rules', 'staticPage.rules');
Route::view('/job', 'staticPage.job');
Route::view('/cargo', 'staticPage.cargo');
Route::view('/gruzotaxi', 'staticPage.gruzotaxi');
Route::view('/contacts', 'staticPage.contacts');
Route::view('/faq', 'staticPage.faq');
Route::view('/equip', 'staticPage.equip');
Route::view('/gazel', 'staticPage.gazel');

// legacy redirect
Route::redirect('/feed2', '/feed', 301);

Route::fallback(function () {
    return view('staticPage.404');
});
