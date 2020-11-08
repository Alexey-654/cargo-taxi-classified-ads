<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'type',
        'cargo_capacity',
        'body_length',
        'body_width',
        'body_height',
        'back_door',
        'side_door',
        'up_door',
        'open_door',
        'movers',
        'title',
        'description',
        'city_price',
        'out_of_town_price',
        'photo',
    ];

    public function feedbacks()
    {
        return $this->hasMany('App\Models\Feedback');
    }

    public static function getAds()
    {
        return Ad::where('state', 'published')->orderBy('type')->latest('updated_at')->paginate(10);
    }

    public static function updateTimeInRandomAds($qnt = 1)
    {
        Ad::inRandomOrder()
            ->take($qnt)
            ->update(['updated_at' => now()]);
    }
}
