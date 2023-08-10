@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Estruturas do Salão: {{ $salao->nome }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>É Adicional</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estruturas as $estrutura)
                <tr>
                    <td>{{ $estrutura->nome }}</td>
                    <td>{{ $estrutura->quantidade }}</td>
                    <td>{{ $estrutura->valor }}</td>
                    <td>{{ $estrutura->is_adicional ? 'Sim' : 'Não' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
