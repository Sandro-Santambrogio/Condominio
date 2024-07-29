<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Usuarios</h2>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                        <i class="fa fa-plus"></i> Agregar Usuario
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usuarios as $usuario)
                                <tr id="usuario-{{ $usuario->id }}">
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->direccion }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td class="estado">
                                        @if($usuario->estado == 1)
                                            <span class="text-success"><b>Activo</b></span>
                                        @elseif($usuario->estado == 2)
                                            <span class="text-danger"><b>Deshabilitado</b></span>
                                        @else
                                            <span class="text-muted"><b>Desconocido</b></span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                        <button class="btn btn-secondary btn-sm cambiar-estado" data-id="{{ $usuario->id }}">
                                            <i class="fa fa-sync"></i> Cambiar Estado
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No hay usuarios disponibles</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Agregar Usuario -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addUserForm" method="POST" action="{{ route('usuarios.store') }}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <input type="hidden" name="estado" value="1">
                    <input type="hidden" name="role_id" value="2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $('#addUserForm').submit(function(e) {
        e.preventDefault(); // Evitar envío normal del formulario

        var form = $(this);

        $.ajax({
            url: form.attr('action'), // URL del controlador
            method: 'POST', // Método de la petición
            data: form.serialize(), // Serializar los datos del formulario
            success: function() {
                $('#addUserModal').modal('hide'); // Cerrar el modal
                form.trigger('reset'); // Limpiar el formulario
                window.location.reload(); // Recargar la página
            },
            error: function(xhr) {
                alert('Error al guardar el usuario.'); // Mostrar mensaje de error en caso de fallo de la petición AJAX
            }
        });
    });
</script>