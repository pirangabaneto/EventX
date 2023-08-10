<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all(); // Importe o modelo Cliente no início do arquivo

        return view('clientes.index', compact('clientes'));
    }
    public function create()
{
    return view('clientes.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'nome' => 'required|string',
        'cpf' => 'required|string',
    ]);

    Cliente::create($data);
    
    return redirect()->route('home'); 
}
}
