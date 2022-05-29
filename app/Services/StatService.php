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

    function getStat(){

        return [
            'total_views' => Statistic::get()->count(),
            'unique_views' => Statistic::select('ip','user_agent')->groupBy('ip','user_agent')->get()->count()
        ];
    }

    function getStatLink($link){ //??

        $row = Statistic::where('id_url','=',$link)->get();

        dd($row);

//        [
//            {
//                "total_views": "number",
//                "unique_views": "number",
//                "date": "Y-d-m"
//            },
//            {
//                "total_views": "number",
//                "unique_views": "number",
//                "date": "Y-d-m"
//            }
//        ]

    }
}
