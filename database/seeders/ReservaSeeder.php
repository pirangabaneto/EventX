<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reserva::create([
            'valor' => 100,
            'horario_inicial' => '2023-08-10 19:46:16',
            'horario_final' => '2023-08-11 19:46:16',
            'tem_recepcao' => true,
            'tem_coffe_break' => true,
            'coffe_break' => 'tradicional',
            'quantidade_recepcionistas' => 5,
            'salao_comercial_id' => 1,
            'cliente_id' => 1, 
        ]);
    }
}
