<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Salao;

class SalaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Salao::create([
            'nome' => 'salao 01',
            'endereco' => 'endereço 01',
            'telefone' => '87991061729',
            'limite_participantes' => 3,
            'horario_inicial' => '10:00:00',
            'horario_final' => '22:00:00',
        ]);

        Salao::create([
            'nome' => 'salao 02',
            'endereco' => 'endereço 02',
            'telefone' => '87991061730',
            'limite_participantes' => 3,
            'horario_inicial' => '08:00:00',
            'horario_final' => '18:00:00',
        ]);
    }
}
