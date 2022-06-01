<?php

namespace App\Services;

use App\Models\Links;

class LinkService
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    function save($data){

        if (isset($data['id'])) {
            $link = Links::findOrFail($data['id']);
        } else {
            $link = new Links();
        }

        $link->title = $data['title'];
        $link->long_url = $data['long_url'];
        $link->short_url = uniqid();
        $link->save();

        $this->tagService->save($link->id, $data['tags']);
        $link = $link->toArray();
        $link['tags'] = $this->tagService->getTags($link['id']);

        return $link;
    }

    function getListLinks(){

        $data = Links::select('id','title','long_url','short_url')->get()->toArray();
        $arrayLinks = array();
        foreach ($data as $link){
            $link['tags'] = $this->tagService->getTags($link['id']);
            $arrayLinks[] = $link;
        }

        return $arrayLinks;
    }

    function getLink($id){
        $data = Links::select('id','title','long_url','short_url')->where('id','=',$id)->first()->toArray();
        $data['tags'] = $this->tagService->getTags($data['id']);
        return $data;
    }

    function getLongLink($link){
        return Links::select('id', 'long_url')->where('short_url','=',$link)->first();
    }

    function delete($id){
        Links::where('id','=',$id)->delete();
    }

    function checkExistLink($id){
        return Links::where('id','=',$id)->first();
    }
}
