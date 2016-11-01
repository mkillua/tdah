<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'class';

    /**
     * Método para retornar os curso.
     * @return object
     */

    public function getClass()
    {
        return Lesson::where('status', 'habilitado');
    }

    public function getClassByIdClass($idClass,$idCourse)
    {
        return Lesson::where('id', $idClass)->where('course_id',$idCourse);
    }

    public function newClass($data)
    {

        $course = new Lesson();
        $course->title = $data['title'];
        $course->status = 'habilitado';
        $course->content = $data['content'];
        $course->user = '1';
        $course->course_id = $data['courseId'];
        return $course->save();
    }
    
}


