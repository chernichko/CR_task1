<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $fillable = [
        'title', 'long_url', 'short_url'
    ];
}

//[{
//    "long_url": "https://google.com&quot",
//"title": "Cool link to google",
//"tags": ["homepage", "mylink"]
//},
//{
//    "long_url": "https://google.com&quot",
//"title": "Cool link to google",
//"tags": ["homepage", "mylink"]
//}]
