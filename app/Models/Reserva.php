<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'valor',
        'horario_inicial',
        'horario_final',
        'quantidade_recepcionistas',
        'salao_comercial_id',
        'cliente_id',
        'tem_recepcao',
        'tem_coffe_break',
        'coffe_break',
        'numero_participantes',
    ];

    public function salao()
    {
        return $this->belongsTo(Salao::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function estruturas()
    {
        return $this->belongsToMany(Estrutura::class, 'reserva_estrutura', 'reserva_id', 'estrutura_id');
    }
}
