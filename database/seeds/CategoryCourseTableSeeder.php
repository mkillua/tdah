<?php

use Illuminate\Database\Seeder;


class CategoryCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_course')->truncate();

        DB::table('category_course')->insert(
            [
            'name' => 'Matemática',
            'status' => 'ativo',
            'user' => '1',
            'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]
        );

        DB::table('category_course')->insert(
            [
                'name' => 'Portugues',
                'status' => 'ativo',
                'user' => '1',
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]
        );

        DB::table('category_course')->insert(
            [
                'name' => 'História',
                'status' => 'ativo',
                'user' => '1',
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]
        );

        DB::table('category_course')->insert(
            [
                'name' => 'Geografia',
                'status' => 'ativo',
                'user' => '1',
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]
        );

        DB::table('category_course')->insert(
            [
                'name' => 'Ingles',
                'status' => 'ativo',
                'user' => '1',
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]
        );

        DB::table('category_course')->insert(
            [
                'name' => 'Ciencias',
                'status' => 'ativo',
                'user' => '1',
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]
        );

        DB::table('category_course')->insert(
            [
                'name' => 'Tecnologia',
                'status' => 'ativo',
                'user' => '1',
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]
        );
    }
}
