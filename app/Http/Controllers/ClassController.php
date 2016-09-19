<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Lesson as Lesson ;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ClassController extends Controller
{
    private $class;

    public function __construct(Lesson $class)
    {
        $this->class = $class;
    }

    
    public function getCategory($id = null)
    {
        return $this->apiReturn(true, $this->courseCategory->getAll()->get(), 200);
    }

    public function  getLesson($idClass,$idCourse)
    {
        $lesson = $this->class->getClassById($idClass,$idCourse)->get();
        if($lesson) {
            return $this->apiReturn(true, $lesson, 200);
        }
            return $this->apiReturn(false, 'aula não encontrada, tente novamente', 400);
    }

    public function postClass()
    {
        if($this->class->newClass(Input::all())) {
            return $this->apiReturn(true, 'curso inserido com sucesso', 200);
        }
        return $this->apiReturn(false, 'erro ao inserir curso', 400);
    }

    public function getClass()
    {
        return $this->apiReturn(true, $this->class->getClass()->get(), 200);
    }
}
