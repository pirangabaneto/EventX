@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Estrutura') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('estruturas.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nome" class="form-label">{{ __('Nome') }}</label>
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required>
                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantidade" class="form-label">{{ __('Quantidade') }}</label>
                            <input id="quantidade" type="number" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" value="{{ old('quantidade') }}" required>
                            @error('quantidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-check-label" for="is_adicional">
                                {{ __('É Adicional') }}
                                <input type="checkbox" id="is_adicional" class="form-check-input @error('is_adicional') is-invalid @enderror" name="is_adicional" value="1" {{ old('is_adicional') ? 'checked' : '' }}>
                            </label>
                            @error('is_adicional')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-check-label" for="is_comum">
                                {{ __('É Comum a Todos') }}
                                <input type="checkbox" id="is_comum" class="form-check-input @error('is_comum') is-invalid @enderror" name="is_comum" value="1" {{ old('is_comum') ? 'checked' : '' }}>
                            </label>
                            @error('is_comum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="valor" class="form-label">{{ __('Valor') }}</label>
                            <input id="valor" type="number" step="0.01" class="form-control @error('valor') is-invalid @enderror" name="valor" value="{{ old('valor') }}" required>
                            @error('valor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="salao_comercial_id" class="form-label">{{ __('Salão Comercial') }}</label>
                            <select id="salao_comercial_id" class="form-select @error('salao_comercial_id') is-invalid @enderror" name="salao_comercial_id">
                                <option value="1" selected>-- Todos --</option>
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

                        <button type="submit" class="btn btn-primary">{{ __('Cadastrar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
