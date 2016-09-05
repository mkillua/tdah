<?php
/**
 * Created by PhpStorm.
 * User: viking
 * Date: 04/09/16
 * Time: 14:40
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    /**
     * Método para retornar os curso.
    * @return object
     */

    public function getCourse()
    {
        return Course::where('status', 'habilitado');
    }

    public function newCourse($data)
    {
        $course = new Course();
        $course->name = $data['name'];
        $course->category = $data['category']['id'];
        $course->status = 'habilitado';
        $course->dificuldade = 'basico';
        $course->image = $data['image'];
        $course->user = '1';
        return $course->save();
    }
}