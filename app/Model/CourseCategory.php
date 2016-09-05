<?php
/**
 * Created by PhpStorm.
 * User: viking
 * Date: 03/09/16
 * Time: 16:14
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{

    protected $table = 'category_course';
    /**
     * Método para retornar todas as categorias de curso.
     * @return object
     */
    public function getAll()
    {
        return CourseCategory::where('status', 'ativo');
    }
}