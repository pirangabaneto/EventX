<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark  min-vh-100 overflow-auto" style="height: 100vh" >
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('saloes.index') }}" class="nav-link @if(Request::is('saloes')) active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Salões Comerciais
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('saloes.create') }}" class="nav-link @if(Request::is('saloes/create')) active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Cadastrar Salão Comercial
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('clientes.index') }}" class="nav-link @if(Request::is('clientes')) active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Clientes
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('clientes.create') }}" class="nav-link @if(Request::is('clientes/create')) active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Cadastrar Cliente
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('reservas.index') }}" class="nav-link @if(Request::is('reservas')) active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                Reservas
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('reservas.create') }}" class="nav-link @if(Request::is('reservas/create')) active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                Realizar Reserva
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('reservas.grafico') }}" class="nav-link @if(Request::is('reservas/grafico')) active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                Gráfico
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('estruturas.index') }}" class="nav-link @if(Request::is('estruturas')) active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Estruturas
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('estruturas.create') }}" class="nav-link @if(Request::is('estruturas/create')) active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Cadastrar Estruturas
            </a>
        </li>
    </ul>
</div>
