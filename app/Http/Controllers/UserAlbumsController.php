<?php

namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Core\Domain\Albums;



class UserAlbumsController extends Controller {

    public function index($userId){
        
       $albums = new Albums($userId);

       return $albums->getAlbums();

    }

}