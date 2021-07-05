@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endsection
@section('content')
    @include('layouts.headers.cards')
    <div class="container">
        <div class="container card">
            <br>
            <div class="card-header">
                <h1 class="card-title">Agregar Alumno al Curso {{ $materia->nombre_materia }}</h1>
                <a class="btn btn-secondary" href="{{ route('maestros.materias.alumnos.index', $materia->id) }}"> Regresar
                </a>
                <span>Link de invitación: www.istuden.com/sdfy567321gy2183y</span>
            </div>
            <div class="table-responsive card-body">
                <table id="addAlumn" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No. Control</th>
                            <th>Nombre</th>
                            <th>eMail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $us)
                            <tr>
                                <td>{{ $us->nocontrol }}</td>
                                <td>{{ $us->name }}</td>
                                <td>{{ $us->email }}</td>
                                <td>
                                    <form action="{{ route('maestros.materias.alumnos.store', $materia->id, $us) }}"
                                        method="POST">
                                        @csrf
                                        <input name="id" type="hidden" id="nombreClase" value="{{ $us->id }}"
                                            required>
                                        <button type="submit" class="btn btn-success btn-sm">Agregar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>s
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addAlumn').DataTable({
                responsive: true,
                bProcessing: true,
                language: {
                    "decimal": ",",
                    "emptyTable": "No Hay Alumnos Registrados.",
                    "info": "Registros _START_ de _END_ de  _TOTAL_ ",
                    "infoEmpty": "Registros 0 al 0 de  _TOTAL_",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "infoThousands": ",",
                    "lengthMenu": "Mostrar _MENU_ ",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "<i class=\"fas fa-chevron-double-left\"></i>",
                        "last": "<i class=\"fas fa-chevron-double-right\"></i>",
                        "next": "<i class=\"fas fa-chevron-right\"></i>",
                        "previous": "<i class=\"fas fa-chevron-left\"></i>"
                    },
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "thousands": ",",
                    "zeroRecords": "No se encontraron resultados",
                    "editor": {
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\\\\\/a&gt;).&lt;\\\/a&gt;<\/a>"
                        },
                    }
                }
            });
        });

    </script>

@endpush
