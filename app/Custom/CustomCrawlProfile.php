<?php

namespace App\Custom;

use Spatie\Crawler\CrawlProfile;
use Psr\Http\Message\UriInterface;

class CustomCrawlProfile extends CrawlProfile
{
    public function shouldCrawl(UriInterface $url): bool
    {
        if (preg_match('(\.jpeg|\.jpg|\.png)', $url->getPath())) {
            return false;
        }
        if (!strpos($url, "gruzovoe-taxi-krasnodar.ru")) {
            return false;
        }

        return true;
    }
}
