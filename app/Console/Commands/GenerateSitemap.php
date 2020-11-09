<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Str;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SitemapGenerator::create(config('app.url'))
            ->hasCrawled(function (Url $url) {
                $url->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);
                if (Str::of($url->url)->contains('?')) {
                    return;
                }
                if ($url->path() === "/") {
                    $url->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY);
                    $url->setPriority(1);
                }
                return $url;
            })
            ->writeToFile(public_path('sitemap.xml'));
    }
}