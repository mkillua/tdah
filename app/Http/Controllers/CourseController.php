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

    public function getCategory($id = null)
    {
            return $this->apiReturn(true, $this->courseCategory->getAll()->get(), 200);
    }

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


}