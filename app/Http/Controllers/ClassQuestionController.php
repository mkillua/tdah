<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\ClassQuestion;
use App\Http\Requests\ClassQuestionPost;
use Illuminate\Support\Facades\Input;


class ClassQuestionController extends Controller
{
    private $classQuestion;

    public function __construct(ClassQuestion $classQuestion)
    {
        $this->classQuestion = $classQuestion;
    }


    public function getQuestion($id = null)
    {
        return $this->apiReturn(true, $this->classQuestion->getQuestionsById($id)->get(), 200);
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function postQuestion(ClassQuestionPost $question)
    {
        if($this->classQuestion->newQuestion($question)) {
            return $this->apiReturn(true, 'curso inserido com sucesso', 200);
        }
        return $this->apiReturn(false, 'erro ao inserir curso', 400);
    }

}
