<?php

namespace App\Http\Controllers;
use App\Models\Salao;
use App\Models\Estrutura;

use Illuminate\Http\Request;

class EstruturaController extends Controller
{
    public function index()
    {
        $estruturas = Estrutura::all(); // ou qualquer lógica de busca que você precise
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

        // Verificar se o checkbox is_adicional está marcado e definir o valor apropriado
        $isAdicional = $request->has('is_adicional') ? 1 : 0;

        // Definir o valor padrão para is_comum (0)
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

        // Crie a estrutura no banco de dados
        //Estrutura::create($data);

        return redirect()->route('estruturas.create')->with('success', 'Estrutura cadastrada com sucesso!');
    }
}
