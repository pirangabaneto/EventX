@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listagem de Estruturas Cadastradas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>É Adicional</th>
                <th>É Comum</th>
                <th>Salão</th>
                <!-- Outras colunas -->
            </tr>
        </thead>
        <tbody>
            @foreach ($estruturas as $estrutura)
                <tr>
                    <td>{{ $estrutura->nome }}</td>
                    <td>{{ $estrutura->quantidade }}</td>
                    <td>{{ $estrutura->valor }}</td>
                    <td>{{ $estrutura->is_adicional ? 'Sim' : 'Não' }}</td>
                    <td>{{ $estrutura->is_comum ? 'Sim' : 'Não' }}</td>
                    <td>{{ $estrutura->salao->nome }}</td>
                    <!-- Outras colunas -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
