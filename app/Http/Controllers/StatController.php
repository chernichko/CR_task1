<?php

namespace App\Http\Controllers;

use App\Services\LinkService;
use App\Services\StatService;

class StatController extends Controller
{
    function getAll(StatService $statService){

        $totalStat = $statService->getStat();

        return response()->json($totalStat);
    }

    function getOne($id, StatService $statService, LinkService $linkService){
        $check = $linkService->checkExistLink($id);

        if($check){
            $statService->getStatLink($id);
//            $linkStat = $statService->getStatLink($id);
//            return response()->json($linkStat);
        }else{
            return response('Not Success');
        }
    }
}
