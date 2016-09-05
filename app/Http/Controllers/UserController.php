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
use JWTAuth;
use Hash;

class UserController extends Controller
{

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser($email, $password)
    {
        $input = ['email' => $email, 'password' => $password];
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json(['result' => 'email ou senha incorretos.'], 400);
        }
        $data = $this->user->getUser($input)->first();
        $data['token'] = $token;
        return $this->apiReturn(true, $data, 200);
    }


    public function postUser()
    {
        $dados = Input::all();
        $dados['password'] = Hash::make($dados['password']);
        $response = $this->user->newUser($dados);
        if ($response) {
            return $this->apiReturn(true, "usuario inserido com sucesso", 201);
        }
        return $this->apiReturn(false, "erro ao inserir usuario verifique as regras", 401);
    }

    public function getEmail($email)
    {
        $response = $this->user->getUsedEmail($email);
        Log::info($response);
        if (count($response) > 1) {
            return $this->apiReturn(true, "Email Disponivel", 200);
        }
        return $this->apiReturn(false, "Email já utilizado", 401);
    }
}