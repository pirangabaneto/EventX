<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estrutura extends Model
{
    use HasFactory;

    protected $table = 'estruturas'; // Nome da tabela no banco de dados

    protected $fillable = [
        'nome',
        'quantidade',
        'is_adicional',
        'valor',
        'salao_comercial_id',
        'is_comum',
    ];

    public function salao()
    {
        return $this->belongsTo(Salao::class, 'salao_comercial_id');
    }

    public function reservas()
    {
        return $this->belongsToMany(Reserva::class, 'reserva_estrutura', 'estrutura_id', 'reserva_id');
    }
}
