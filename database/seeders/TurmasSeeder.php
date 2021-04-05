<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turmas')->insert([
            'ano_execucao' => '2021-01-01',
            'nivel_educacao' => 'nível médio',
            'nivel_serie' => '1º ano',
            'turno' => 'manhã',
        ]);
    }
}
