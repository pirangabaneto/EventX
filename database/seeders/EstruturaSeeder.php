<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estrutura;

class EstruturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estrutura::create([
            'nome' => 'palco',
            'quantidade' => 1,
            'is_adicional' => false,
            'is_comum' => true,
            'valor' => 100,
            'salao_comercial_id' => 1,
        ]);

        Estrutura::create([
            'nome' => 'mesa para convidados',
            'quantidade' => 100,
            'is_adicional' => false,
            'is_comum' => true,
            'valor' => 150,
            'salao_comercial_id' => 1,
        ]);

        Estrutura::create([
            'nome' => 'projetor',
            'quantidade' => 10,
            'is_adicional' => false,
            'is_comum' => true,
            'valor' => 10,
            'salao_comercial_id' => 1,
        ]);

        Estrutura::create([
            'nome' => 'microfone',
            'quantidade' => 100,
            'is_adicional' => false,
            'is_comum' => true,
            'valor' => 15,
            'salao_comercial_id' => 1,
        ]);

        Estrutura::create([
            'nome' => 'PA',
            'quantidade' => 100,
            'is_adicional' => false,
            'is_comum' => true,
            'valor' => 150,
            'salao_comercial_id' => 1,
        ]);

        Estrutura::create([
            'nome' => 'flipcharts',
            'quantidade' => 10,
            'is_adicional' => true,
            'is_comum' => true,
            'valor' => 150,
            'salao_comercial_id' => 1,
        ]);

        Estrutura::create([
            'nome' => 'estruturas para backdrops',
            'quantidade' => 100,
            'is_adicional' => true,
            'is_comum' => false,
            'valor' => 150,
            'salao_comercial_id' => 1,
        ]);

        Estrutura::create([
            'nome' => 'estruturas para banners de boas vindas',
            'quantidade' => 100,
            'is_adicional' => true,
            'is_comum' => false,
            'valor' => 150,
            'salao_comercial_id' => 1,
        ]);

        Estrutura::create([
            'nome' => 'telão de fundo para palco',
            'quantidade' => 100,
            'is_adicional' => true,
            'is_comum' => false,
            'valor' => 150,
            'salao_comercial_id' => 1,
        ]);

        Estrutura::create([
            'nome' => 'placas de mesa',
            'quantidade' => 100,
            'is_adicional' => true,
            'is_comum' => false,
            'valor' => 150,
            'salao_comercial_id' => 1,
        ]);


    }
}
