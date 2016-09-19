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

    /**
     * @SWG\Get(
     *     path="/user/login/{email}/{password}",
     *     summary="Busca Usuario por email e senha",
     *     tags={"user"},
     *     description="Muliple tags can be provided with comma seperated strings. Use tag1, tag2, tag3 for testing.",
     *     operationId="getUserByEmailAndPassword",
     *     consumes={"application/xml", "application/json"},
     *     produces={"application/xml", "application/json"},
     *     @SWG\Parameter(
     *         name="email",
     *         in="path",
     *         description="email do usuario",
     *         required=true,
     *         type="string",
     *         @SWG\Items(type="string"),
     *         collectionFormat="multi"
     *     ),
     *     @SWG\Parameter(
     *         name="password",
     *         in="path",
     *         description="password do usuario",
     *         required=true,
     *         type="string",
     *         @SWG\Items(type="string"),
     *         collectionFormat="multi"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="object with name,email,token access,register date",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definoitions/Pet")
     *         ),
     *     ),
     *     @SWG\Response(
     *         response="400",
     *         description="Usuario e senha não encontrado",
     *     ),
     * )
     */

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

    /**
     * @SWG\Post(
     *     path="/user/register",
     *     summary="Insere um novo usuario no sistema",
     *     tags={"user"},
     *     description="insere um novo usuario no sistema",
     *     operationId="getUserByEmailAndPassword",
     *     consumes={"application/xml", "application/json"},
     *     produces={"application/xml", "application/json"},
     *     @SWG\Parameter(
     *         name="email",
     *         in="query",
     *         description="email do usuario",
     *         required=true,
     *         type="string",
     *         @SWG\Items(type="string"),
     *         collectionFormat="multi"
     *     ),
     *     @SWG\Parameter(
     *         name="name",
     *         in="query",
     *         description="Nome do usuario",
     *         required=true,
     *         type="string",
     *         @SWG\Items(type="string"),
     *         collectionFormat="multi"
     *     ),
     *     @SWG\Parameter(
     *         name="password",
     *         in="query",
     *         description="password do usuario",
     *         required=true,
     *         type="string",
     *         @SWG\Items(type="string"),
     *         collectionFormat="multi"
     *     ),
     *      @SWG\Parameter(
     *         name="passwordConfirm",
     *         in="query",
     *         description="email do usuario",
     *         required=true,
     *         type="string",
     *         @SWG\Items(type="string"),
     *         collectionFormat="multi"
     *     ),
     *      @SWG\Parameter(
     *         name="role_id",
     *         in="query",
     *         description="1 para aluno 2 para professor",
     *         required=true,
     *         type="integer",
     *         @SWG\Items(type="integer"),
     *         collectionFormat="multi"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="usuario cadastrado com sucesso",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definoitions/Pet")
     *         ),
     *     ),
     *     @SWG\Response(
     *         response="400",
     *         description="erro ao cadastrar, tente novamente",
     *     ),
     * )
     */
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