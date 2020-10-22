<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = [
        'name',
        'email',
        'ad_id',
        'score',
        'message'
    ];

    public function ad()
    {
        return $this->belongsTo('App\Models\Ad');
    }

    public static function getFeedBacks()
    {
        return Feedback::latest()->take(3)->get();
    }
}
