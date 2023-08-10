<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salao extends Model
{
    protected $table = 'salaos'; // Nome da tabela no banco de dados
    protected $fillable = [
        'nome',
        'endereco',
        'telefone',
        'limite_participantes',
        'horario_inicial',
        'horario_final',
    ];
    use HasFactory;
}
