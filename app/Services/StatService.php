<?php

namespace App\Services;

use App\Models\Statistic;

class StatService
{
    function save($link){

        $stat = new Statistic();

        $stat->id_url = $link;
        $stat->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $stat->ip = $_SERVER['REMOTE_ADDR'];

        $stat->save();

    }
}
