
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Salão Comercial') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('saloes.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nome" class="form-label">{{ __('Nome') }}</label>
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autofocus>
                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="endereco" class="form-label">{{ __('Endereço') }}</label>
                            <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ old('endereco') }}" required>
                            @error('endereco')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telefone" class="form-label">{{ __('Telefone') }}</label>
                            <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" required>
                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="horario_inicial" class="form-label">{{ __('Horário Inicial') }}</label>
                            <input id="horario_inicial" type="time" class="form-control @error('horario_inicial') is-invalid @enderror" name="horario_inicial" value="{{ old('horario_inicial') }}" required>
                            @error('horario_inicial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="horario_final" class="form-label">{{ __('Horário Final') }}</label>
                            <input id="horario_final" type="time" class="form-control @error('horario_final') is-invalid @enderror" name="horario_final" value="{{ old('horario_final') }}" required>
                            @error('horario_final')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="limite_participantes" class="form-label">{{ __('Limite de Participantes') }}</label>
                            <input id="limite_participantes" type="number" class="form-control @error('limite_participantes') is-invalid @enderror" name="limite_participantes" value="{{ old('limite_participantes') }}" required>
                            @error('limite_participantes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Cadastrar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

