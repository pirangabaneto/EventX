@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Realizar Reserva') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reservas.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="valor" class="form-label">{{ __('Valor') }}</label>
                            <input id="valor" type="text" class="form-control @error('valor') is-invalid @enderror" name="valor" value="{{ old('valor') }}" required>
                            @error('valor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="horario_inicial" class="form-label">{{ __('Horário Inicial') }}</label>
                            <input id="horario_inicial" type="datetime-local" class="form-control @error('horario_inicial') is-invalid @enderror" name="horario_inicial" value="{{ old('horario_inicial') }}" required>
                            @error('horario_inicial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="horario_final" class="form-label">{{ __('Horário Final') }}</label>
                            <input id="horario_final" type="datetime-local" class="form-control @error('horario_final') is-invalid @enderror" name="horario_final" value="{{ old('horario_final') }}" required>
                            @error('horario_final')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-check-label" for="is_comum">
                                {{ __('Tem Recepção') }}
                                <input type="checkbox" id="tem_recepcao" class="form-check-input @error('tem_recepcao') is-invalid @enderror" name="tem_recepcao" value="1" {{ old('tem_recepcao') ? 'checked' : '' }}>
                            </label>
                            @error('is_comum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-check-label" for="is_comum">
                                {{ __('Tem Coffe Break') }}
                                <input type="checkbox" id="tem_coffe_break" class="form-check-input @error('tem_coffe_break') is-invalid @enderror" name="tem_coffe_break" value="1" {{ old('tem_coffe_break') ? 'checked' : '' }}>
                            </label>
                            @error('tem_coffe_break')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-check-label" for="coffe_break">
                                {{ __('Coffe Break') }}
                            </label>
                            <select id="coffe_break" class="form-select @error('coffe_break') is-invalid @enderror" name="coffe_break">
                                <option value="tradicional" {{ old('coffe_break') === 'tradicional' ? 'selected' : '' }}>Tradicional</option>
                                <option value="premium" {{ old('coffe_break') === 'premium' ? 'selected' : '' }}>Premium</option>
                            </select>
                            @error('coffe_break')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                        <div class="mb-3">
                            <label for="quantidade_recepcionistas" class="form-label">{{ __('Quantidade de Recepcionistas') }}</label>
                            <input id="quantidade_recepcionistas" type="number" class="form-control @error('quantidade_recepcionistas') is-invalid @enderror" name="quantidade_recepcionistas" value="{{ old('quantidade_recepcionistas') }}">
                            @error('quantidade_recepcionistas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        <div class="mb-3">
                            <label for="salao_comercial_id" class="form-label">{{ __('Salão Comercial') }}</label>
                            <select id="salao_comercial_id" class="form-select @error('salao_comercial_id') is-invalid @enderror" name="salao_comercial_id" required>
                                @foreach ($saloes as $salao)
                                    <option value="{{ $salao->id }}">{{ $salao->nome }}</option>
                                @endforeach
                            </select>
                            @error('salao_comercial_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>{{ __('Estruturas Adicionais:') }}</label>
                            <br>
                            @foreach ($estruturasAdicionais as $estrutura)
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="estruturas_adicionais[]" value="{{ $estrutura->id }}">
                                    {{ $estrutura->nome }}
                                </label>
                                <br>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <label for="numero_participantes" class="form-label">{{ __('Número de Participantes') }}</label>
                            <input id="numero_participantes" type="number" class="form-control @error('numero_participantes') is-invalid @enderror" name="numero_participantes" value="{{ old('numero_participantes') }}">
                            @error('numero_participantes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cliente_id" class="form-label">{{ __('Cliente') }}</label>
                            <select id="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror" name="cliente_id" required>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Realizar Reserva') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
