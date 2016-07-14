<?php
/**
 * Created by PhpStorm.
 * User: Mauricio
 * Date: 25/06/16
 * Time: 11:11
 */


namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\User as User;
use Log;

class UserController extends Controller
{

public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser($email,$password)
    {
        $password = sha1($password);
        return $this->user->findAllUsers($email,$password)->get();
    }

    public function postUser()
    {

      $response =  $this->user->insertUser(Input::all());
        Log::info($response);
        return json_encode($response);


    }

}