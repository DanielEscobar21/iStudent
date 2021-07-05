@extends('adminlte::page')

@section('title', 'iStudent Administrador')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('content_header')
    <h1>Usuario</h1>
@endsection
    
@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @elseif (session('delete'))
        <div class="alert alert-danger">
            <strong>{{ session('delete') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary" href="{{ route('admin.user.create') }}"> Registrar Usuario </a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="usuarios">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>idEs</th>
                        <th>Rol</th>
                        <th>Creado</th>
                        <th>Editado</th>
                        <th>Verf</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users)
                        <tr>
                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->nocontrol }}</td>
                            <td>{{ $users->role }}</td>
                            <td>{{ $users->created_at->diffForHumans() }}</td>
                            <td>{{ $users->updated_at->diffForHumans() }}</td>
                            <td>{{ $users->email_verified_at->diffForHumans() }}</td>
                            <td><a href="{{ route('admin.user.edit', $users) }}"
                                    class="btn btn-primary btn-sm">Editar</a></td>
                            <td>
                                <form action="{{ route('admin.user.destroy', $users) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#usuarios').DataTable(responsive:true, autoWidth: false);
    </script>
@endsection
