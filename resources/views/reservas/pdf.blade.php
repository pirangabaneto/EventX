<!DOCTYPE html>
<html>
<head>
    <title>Reserva - {{ $reserva->id }}</title>
</head>
<body>
    <h1>Detalhes da Reserva</h1>
    <p>ID: {{ $reserva->id }}</p>
    <p>Valor: {{ $reserva->valor }}</p>
    <p>Horário Inicial: {{ $reserva->horario_inicial }}</p>
    <p>Horário Final: {{ $reserva->horario_final }}</p>
    <p>Quantidade de Recepcionistas: {{ $reserva->quantidade_recepcionistas }}</p>
    <p>Salão Comercial: {{ $salao->nome }}</p>
    <p>Cliente: {{ $reserva->cliente->nome }}</p>
    
    <h2>Estruturas Adicionais:</h2>
    @foreach ($estruturasAdicionais as $estrutura)
        <p>{{ $estrutura->nome }}</p>
    @endforeach
</body>
</html>
