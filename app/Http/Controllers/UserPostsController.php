<?php

namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Core\Domain\Posts;



class UserPostsController extends Controller {

    public function index($userId){
        
       $post = new Posts($userId);

       return $post->getPosts();

    }

}