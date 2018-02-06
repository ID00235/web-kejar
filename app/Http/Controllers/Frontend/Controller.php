<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Profil;
use App\Models\Organisasi;
use SEOMeta;
use OpenGraph;
use Twitter;


class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function getlistmenu(){
    	$profil = Profil::select('id','nama')->get();
        $organisasi = Organisasi::select('id','nama')->get();
        
    	return array("profil"=>$profil,"organisasi"=>$organisasi);
    }

   

    public function setSEO($title, $description, $url, $image){
    	SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::addKeyword("Kecamatan Batin XXIV Kabupaten Batang Hari, Batang Hari, Informasi, Kecamatan, Batin, ". $title);
        
        OpenGraph::setDescription($description);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage($image);

        Twitter::setTitle($title); // title of twitter card tag
        Twitter::setSite("@batangharikab"); // site of twitter card tag
        Twitter::setDescription($description); // description of twitter card tag
        Twitter::addImage($image); // add image url
    }
}
