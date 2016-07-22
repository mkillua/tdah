<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Model\Role;

class RoleTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('role')->truncate();

        Role::create([
            'id' => 1,
            'name' => 'Root',
            'description' => 'Usuario Mestre, Desenvolvedores e Analistas'
        ]);

        Role::create([
            'id' => 2,
            'name' => 'Aluno',
            'description' => 'grupo voltado para os estudantes da aplicação'
        ]);

        Role::create([
            'id' => 3,
            'name' => 'Professor',
            'description' => 'permite criação de aulas, correção dos exercicios etc.'
        ]);

        Role::create([
            'id' => 4,
            'name' => 'Pesquisadores',
            'description' => 'destinado aos pesquisadores que desejam ver relatorios da base de dados'
        ]);
    }
}
