@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Salões Comerciais</h1>

    <ul>
        @foreach($saloes as $salao)
            <li>
                {{ $salao->nome }} - {{ $salao->endereco }} - {{ $salao->telefone }}
                <a href="{{ route('saloes.estruturas', ['salao' => $salao->id]) }}">Ver Estruturas</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
