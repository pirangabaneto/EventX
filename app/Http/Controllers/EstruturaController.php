<?php

namespace App\Http\Controllers;
use App\Models\Salao;
use App\Models\Estrutura;

use Illuminate\Http\Request;

class EstruturaController extends Controller
{
    public function index()
    {
        $estruturas = Estrutura::all();
        return view('estruturas.index', compact('estruturas'));
    }

    public function create()
    {
        $saloes = Salao::all();

        return view('estruturas.create', compact('saloes'));
    }

    public function store(Request $request)
    {
        $validatedData  = $request->validate([
            'nome' => 'required|string',
            'quantidade' => 'required|integer',
            'valor' => 'required|numeric',
            'salao_comercial_id' => 'required|integer',
        ]);

        $isAdicional = $request->has('is_adicional') ? 1 : 0;

        $isComum = $request->has('is_comum') ? 1 : 0;;

        // Criar e salvar o registro no banco de dados
        $data = new Estrutura([
            'nome' => $validatedData['nome'],
            'quantidade' => $validatedData['quantidade'],
            'valor' => $validatedData['valor'],
            'salao_comercial_id' => $validatedData['salao_comercial_id'],
            'is_adicional' => $isAdicional,
            'is_comum' => $isComum,
        ]);

        // Salvar o registro no banco de dados
        $data->save();

        return redirect()->route('estruturas.index')->with('success', 'Estrutura cadastrada com sucesso!');
    }
}
