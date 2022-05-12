<?php

namespace App\Http\Core\Domain;
use App\Models\TableLogs;


class Log{

    private $requestType;
    private $idType;
    private $requestId;
    private $responseTotal;

    public function __construct($requestType,$idType,$requestId,$responseTotal)
    {
        $this->requestType = $requestType;
        $this->idType = $idType;
        $this->requestId = $requestId;
        $this->responseTotal = $responseTotal;
    }

    public function saveLog(){

        $data = ["request_type"=> $this->requestType,
                "id_type" => $this->idType,
                "request_id"=>$this->requestId,
                "response_total"=> $this->responseTotal];

        $log = new TableLogs($data);
        $log->save();
    }

}