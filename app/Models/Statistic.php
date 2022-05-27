<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table = 'statistic';

    protected $fillable = [
        'id_url', 'ip', 'user_agent'
    ];
}
