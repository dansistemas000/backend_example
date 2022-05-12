<?php

namespace App\Http\Core\Domain;
use App\Http\Core\Aplication\WebServiceData;
use App\Http\Core\Domain\Paths;

class Albums{

    private $path = Paths::PLACEHOLDER.'albums?userId=';
    private $userId;
    private $albumArray = [];
    private $responseTotal;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function getAlbums(){

        $responseWebService = new WebServiceData($this->path.$this->userId);

        $data = $responseWebService->getData();

        $data = json_decode($data);

        foreach($data as $value){

            array_push($this->albumArray,array("id"=>$value->id,"title"=>$value->title));
        }

        $this->responseTotal = count($data);

        $log = new Log("albums","userId",$this->userId,$this->responseTotal);
        $log->saveLog();

        return  json_encode($this->albumArray);

    }

}