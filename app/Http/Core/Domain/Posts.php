<?php

namespace App\Http\Core\Domain;
use App\Http\Core\Aplication\WebServiceData;
use App\Http\Core\Domain\Paths;

class Posts{

    private $path = Paths::PLACEHOLDER.'posts?userId=';
    private $userId;
    private $postsArray = [];
    private $responseTotal;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function getPosts(){

        $responseWebService = new WebServiceData($this->path.$this->userId);

        $data = $responseWebService->getData();

        $data = json_decode($data);

        $this->responseTotal = count($data);

        foreach($data as $value){

            array_push($this->postsArray,array("title"=>$value->title,"body"=>$value->body));
        }

        $log = new Log("posts","userId",$this->userId,$this->responseTotal);
        $log->saveLog();

        return  json_encode($this->postsArray);
    }
    
}