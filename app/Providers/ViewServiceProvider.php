<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
// use Illuminate\View\View;
use App\Models\Ad;
use App\Models\Feedback;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
                'main',
                'perevozka-mebeli',
                'personal',
                'pereezdy',
                'carrying',
                'gruzchiki',
            ],
            function ($view) {
                $ads = Ad::getAds();
                $feedbacks = Feedback::getFeedBacks();
                $view->with('ads', $ads);
                $view->with('feedbacks', $feedbacks);
            }
        );
    }
}
