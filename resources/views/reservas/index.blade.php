@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reservas Realizadas') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Valor</th>
                                <th>Horário Inicial</th>
                                <th>Horário Final</th>
                                <th>Quantidade de Recepcionistas</th>
                                <th>Salão Comercial</th>
                                <th>Cliente</th>
                                <th>Estruturas Adicionais</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($reservas); $i++)
                            <tr>
                                <td>{{ $reservas[$i]->id }}</td>
                                <td>{{ $reservas[$i]->valor }}</td>
                                <td>{{ $reservas[$i]->horario_inicial }}</td>
                                <td>{{ $reservas[$i]->horario_final }}</td>
                                <td>{{ $reservas[$i]->quantidade_recepcionistas }}</td>
                                <td>{{ $saloes[$i]->nome }}</td>
                                <td>{{ $reservas[$i]->cliente->nome }}</td>
                                <td>
                                    @foreach ($estruturasPorReserva[$reservas[$i]->id] as $estrutura)
                                        {{ $estrutura->nome }}
                                        <br>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('reservas.pdf', ['id' => $reservas[$i]->id]) }}" class="btn btn-primary">
                                        Gerar PDF
                                    </a>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
