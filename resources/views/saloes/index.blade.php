@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Salões Comerciais</h1>

    <div class="row">
        <div class="col-md-8">
            <ul class="list-group">
                @foreach($saloes as $salao)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h4>{{ $salao->nome }}</h4>
                            <p class="mb-0">{{ $salao->endereco }} - {{ $salao->telefone }}</p>
                            <strong>Horário Abertura:</strong> {{ $salao->horario_inicial }}<br>
                            <strong>Horário Encerramento:</strong> {{ $salao->horario_final }}
                        </div>
                        <a href="{{ route('saloes.estruturas', ['salao' => $salao->id]) }}" class="btn btn-primary">Ver Estruturas</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
