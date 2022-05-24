<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Services\LinkService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function create(Request $request, LinkService $linkService){

        $link = $linkService->save($request->all());

        dd($link);

    }

    function getAll(LinkService $linkService){

        $linkArray = $linkService->getListLinks();

        dd($linkArray);
    }

    function getOne($id, LinkService $linkService){

        $link = $linkService->getLink($id);

        dd($link);
    }

    function update($id, Request $request, LinkService $linkService){

        $data = $request->all();
        $data['id'] = $id; //??

        $link = $linkService->save($data);

        dd($link);
    }

    function delete($id, LinkService $linkService){

        $linkService->delete($id);

        dd($id);
    }
}
