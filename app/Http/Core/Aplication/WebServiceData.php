<?php

namespace App\Http\Core\Aplication;


class WebServiceData{

    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getData(){
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,  $this->path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

}