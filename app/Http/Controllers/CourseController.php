<?php
/**
 * Created by PhpStorm.
 * User: viking
 * Date: 03/09/16
 * Time: 16:08
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\CourseCategory as  CourseCategory;
use App\Model\Course  as  Course;
use Log;
use JWTAuth;
use Hash;

class CourseController extends Controller
{
    private $courseCategory;
    private $course;

    public function __construct(CourseCategory $courseCategory, Course $course)
    {
        $this->courseCategory = $courseCategory;
        $this->course = $course;
    }


    /**
     * @SWG\Get(
     *     path="/course/category",
     *     summary="Busca todas as categorias de cursos disponiveis",
     *     tags={"cursos"},
     *     description="Método responsavel por trazer todos as categorias de cursos existentes",
     *     operationId="getUserByEmailAndPassword",
     *     consumes={"application/xml", "application/json"},
     *     produces={"application/xml", "application/json"},
     *     @SWG\Response(
     *         response=200,
     *         description="object with datas of course",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definoitions/Pet")
     *         ),
     *     ),
     *     @SWG\Response(
     *         response="400",
     *         description="categorias não encontradas",
     *     ),
     * )
     */
    public function getCategory($id = null)
    {
            return $this->apiReturn(true, $this->courseCategory->getAll()->get(), 200);
    }

    /**
     * @SWG\Post(
     *     path="/course/course",
     *     summary="Insere um novo curso no sistema",
     *     tags={"user"},
     *     description="insere um novo curso no sistema",
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
    public function postCourse()
    {
        if($this->course->newCourse(Input::all())) {
            return $this->apiReturn(true, 'curso inserido com sucesso', 200);
        }
        return $this->apiReturn(false, 'erro ao inserir curso', 400);
    }

    public function getCourse()
    {
        return $this->apiReturn(true, $this->course->getCourse()->get(), 200);
    }
    
    public function deleteCourse($id)
    {

        if($this->course->deleteCourse($id)) {
            return $this->apiReturn(true, 'curso removido com sucesso', 200);
        }
        return $this->apiReturn(false, 'erro ao remover curso', 422);
    }


}