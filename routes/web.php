<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AdFeedbackController;
use App\Http\Controllers\AdminFormsController;
use App\Models\Ad;
use App\Models\Feedback;

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

Route::resource('ads', AdController::class);
Route::patch('ads/update-time/{ad}', [AdController::class, 'updateTime'])->name('ads.updateTime');

Route::get('/feeds', [AdFeedbackController::class, 'index'])->name('feeds.index');
Route::post('/feeds/create', [AdFeedbackController::class, 'store'])->name('feeds.store');


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

Route::redirect('/feed', 'feeds', 301);
Route::redirect('/feed2', 'feeds', 301);

Route::fallback(function () {
    return view('staticPage.404');
});
