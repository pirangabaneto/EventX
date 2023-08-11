<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salao;
use App\Models\Estrutura;


class SalaoController extends Controller
{
    public function index()
    {
        $saloes = Salao::all(); 

        return view('saloes.index', compact('saloes'));
    }

    public function create()
    {
        return view('saloes.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string',
            'endereco' => 'required|string',
            'telefone' => 'required|string',
            'limite_participantes' => 'required|integer',
            'horario_inicial' => 'required',
            'horario_final' => 'required',
        ]);

        Salao::create($data);

        return redirect()->route('saloes.create')->with('success', 'Salão Comercial cadastrado com sucesso!');
    }

    public function showEstruturas(Salao $salao)
    {
        $estruturas = Estrutura::where(function ($query) use ($salao) {
            $query->where('is_comum', 1)
                ->orWhere('salao_comercial_id', $salao->id);
        })->get();

        return view('saloes.estruturas_salao', compact('salao', 'estruturas'));
    }

}
