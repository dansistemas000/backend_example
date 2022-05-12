<?php

namespace App\Http\Core\Domain;
use App\Http\Core\Aplication\WebServiceData;
use App\Http\Core\Domain\Paths;
use App\Http\Core\Domain\Log;

class Users{

    private $path = Paths::PLACEHOLDER.'users';

    private $usersArray = [];
    private $responseTotal;

    public function getUsers(){

        $responseWebService = new WebServiceData($this->path);

        $data = $responseWebService->getData();

        $data = json_decode($data);

        $this->responseTotal = count($data);

        foreach($data as $value){

            array_push($this->usersArray,array("id"=>$value->id,"name"=>$value->name));
        }

        $log = new Log("users",'',0,$this->responseTotal);
        $log->saveLog();


        return  json_encode($this->usersArray);
    }
    
}