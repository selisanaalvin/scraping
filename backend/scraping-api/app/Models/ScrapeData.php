<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScrapeData extends Model
{
    use HasFactory;
    protected $fillable = [
        'leaguename',
        'hometeam',
        'matchstartdate',
        'awayteam',
        'homeodds',
        'drawodds',
        'awayodds',
    ];
}
