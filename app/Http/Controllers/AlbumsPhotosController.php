<?php

namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Core\Domain\Photos;



class AlbumsPhotosController extends Controller {

    public function index($albumId){
        
       $albums = new Photos($albumId);

       return $albums->getPhotos();

    }

}