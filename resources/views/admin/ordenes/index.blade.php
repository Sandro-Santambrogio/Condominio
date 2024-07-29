<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>Órdenes</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Fecha de Creación</th>
                        <th>Monto Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordenes as $orden)
                        <tr>
                            <td>{{ $orden->id }}</td>
                            <td>{{ $orden->usuario->nombre}}</td>
                            <td>{{ $orden->created_at }}</td>
                            <td>{{ $orden->montoTotal() }}</td>
                            <td>
                                @if($orden->estado == 1)
                                    <span class="text-danger"><b>No Pagado</b></span>
                                @elseif($orden->estado == 2)
                                    <span class="text-success"><b>Pagado</b></span>
                                @else
                                    <span class="text-muted"><b>Desconocido</b></span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('ordenes.edit', $orden->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="{{ route('ordenes.show', $orden->id) }}" class="btn btn-info btn-sm">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
