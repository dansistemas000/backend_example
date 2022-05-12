<?php

namespace app\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Core\Domain\Users;



class UsersController extends Controller {

    public function index(){
        
       $users = new Users();

       return $users->getUsers();

    }

}