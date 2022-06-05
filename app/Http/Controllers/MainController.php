<?php

namespace App\Http\Controllers;

use App\Services\LinkService;
use App\Services\StatService;

class MainController
{
    protected $linkService;

    public function __construct(LinkService $linkService)
    {
        $this->linkService = $linkService;
    }

    function main(){
        $listLinks = $this->linkService->getListLinks();
        return view('main', ['list' => $listLinks]);
    }

    function redirect($link, StatService $statService){
        $longLink = $this->linkService->getLongLink($link);
        $statService->save($longLink->id);
        return redirect($longLink->long_url);
    }
}
