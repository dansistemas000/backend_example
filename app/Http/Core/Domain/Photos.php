<?php

namespace App\Http\Core\Domain;
use App\Http\Core\Aplication\WebServiceData;
use App\Http\Core\Domain\Paths;
use App\Http\Core\Domain\Log;

class Photos{

    private $path = Paths::PLACEHOLDER.'photos?albumId=';
    private $albumId;
    private $photosArray = [];
    private $responseTotal;

    public function __construct($albumId)
    {
        $this->albumId = $albumId;
    }

    public function getPhotos(){

        $responseWebService = new WebServiceData($this->path.$this->albumId);

        $data = $responseWebService->getData();

        $data = json_decode($data);

        $this->responseTotal = count($data);

        foreach($data as $value){

            array_push($this->photosArray,array("title"=>$value->title,"url"=>$value->url,"thumbnailUrl"=>$value->thumbnailUrl));
        }

        $log = new Log("photos","albumId",$this->albumId,$this->responseTotal);
        $log->saveLog();


        return  json_encode($this->photosArray);

    }

}