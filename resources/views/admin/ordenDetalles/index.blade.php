<div class="container mt-5">
    <h1 class="text-center mb-4">ÓrdenDetalles</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>ÓrdenDetalles</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Orden</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ordenDetalles as $detalle)
                                <tr>
                                    <td>{{ $detalle->id }}</td>
                                    <td>{{ $detalle->orden->id }}</td>
                                    <td>{{ $detalle->producto->nombre }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>{{ $detalle->precio }}</td>
                                    <td>
                                        <a href="{{ route('orden-detalles.edit', $detalle->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="{{ route('orden-detalles.show', $detalle->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
