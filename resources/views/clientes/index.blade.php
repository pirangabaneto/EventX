@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listagem de Clientes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->cpf }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
