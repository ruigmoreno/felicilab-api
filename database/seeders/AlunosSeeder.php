<?php

namespace Database\Seeders;

use Faker\Provider\pt_BR\PhoneNumber;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlunosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alunos')->insert([
            'nome' => 'Rui Moreno',
            'telefone' => '85987654321',
            'email' => 'comprgmoreno@edu.unifor.br',
            'data_nascimento' => '2021-04-07',
            'genero' => 'masculino'
        ]);
    }
}
