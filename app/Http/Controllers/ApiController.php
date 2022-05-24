<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Services\LinkService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function create(Request $request, LinkService $linkService){
        $this->validateRequest($request);
        $link = $linkService->save($request->all());

        dd($link);

    }

    function getAll(LinkService $linkService){

        $linkArray = $linkService->getListLinks();

        dd($linkArray);
    }

    function getOne($id, LinkService $linkService){
        $check = $linkService->checkExistLink($id);

        if($check){
            $link = $linkService->getLink($id);
            dd($link);
        }else{
            dd(false);
        }

    }

    function update($id, Request $request, LinkService $linkService){
        $this->validateRequest($request);
        $check = $linkService->checkExistLink($id);

        if($check){
            $data = $request->all();
            $data['id'] = $id; //??

            $link = $linkService->save($data);

            dd($link);
        }else{
            dd(false);
        }
    }

    function delete($id, LinkService $linkService){
        $check = $linkService->checkExistLink($id);
        if($check){
            $linkService->delete($id);
            dd($id);
        }else{
            dd(false);
        }
    }

    function validateRequest($request){
        $this->validate($request, [
            'title' => 'required',
            'long_url' => 'required|url',
            'tags' => 'required|array'
        ]);
    }
}
