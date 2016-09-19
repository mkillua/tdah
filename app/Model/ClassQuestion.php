<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassQuestion extends Model
{
    protected $table = 'class_questions';

    /**
     * Método para retornar os curso.
     * @return object
     */

    public function getAllQuestions()
    {
        return self::where('status', 'habilitado');
    }

    public function getQuestionsById($id)
    {
        return self::where('id_class', $id);
    }

    public function newQuestion($data)
    {

        $question = new ClassQuestion();
        $question->question = $data['question'];
        $question->id_class = $data['classId'];
        $question->status =     'habilitado';
        $question->correct_response = $data['correct_response'];
        $question->wrong_response1 = $data['wrong_response1'];
        $question->wrong_response2 = $data['wrong_response2'];
        $question->wrong_response3 = $data['wrong_response3'];
        $question->user = 1;
        return $question->save();

    }
}


