<?php

namespace App\Services;

use App\Models\Tags;

class TagService
{
    function save($id_link,$tags){
        Tags::where('id_url', $id_link)->delete();

        foreach ($tags as $tag){
            $curTag = new Tags();
            $curTag->id_url = $id_link;
            $curTag->tag = $tag;
            $curTag->save();
        }
    }

    function getTags($id_link){

        $array = Tags::select('tag')->where('id_url', $id_link)->get()->toArray();
        $newTagArray = array();
        foreach ($array as $ar){
            $newTagArray[] = $ar['tag'];
        }

        return $newTagArray;
    }
}
