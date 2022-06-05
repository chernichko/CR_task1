<?php

namespace App\Http\Controllers;

use App\Services\LinkService;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    function create(Request $request, LinkService $linkService){

        $link = array();

        if (count($request->all()) == count($request->all(), COUNT_RECURSIVE))
        {
            $this->validateRequest($request);
            $link = $linkService->save($request->all());
        }
        else
        {
            foreach ($request->all() as $array){
                //validate ??
                $link_tmp = $linkService->save($array);
                $link[] = $link_tmp;
            }
        }

        return response()->json($link);

    }

    function getAll(LinkService $linkService){

        $linkArray = $linkService->getListLinks();

        return response()->json($linkArray);
    }

    function getOne($id, LinkService $linkService){
        $check = $linkService->checkExistLink($id);

        if($check){
            $link = $linkService->getLink($id);
            return response()->json($link);
        }

        return response('Not Success', 404);
    }

    function update($id, Request $request, LinkService $linkService){
        $this->validateRequest($request);
        $check = $linkService->checkExistLink($id);

        if($check){
            $data = $request->all();
            $data['id'] = $id; //??

            $link = $linkService->save($data);

            return response()->json($link);
        }

        return response('Not Success', 404);

    }

    function delete($id, LinkService $linkService){
        $check = $linkService->checkExistLink($id);
        if($check){
            $linkService->delete($id);
            return response('Success', 200);
        }

        return response('Not Success', 404);
    }

    function validateRequest($request){
        $this->validate($request, [
            'title' => 'required',
            'long_url' => 'required|url',
            'tags' => 'required|array'
        ]);
    }
}
