@extends('layouts.app')

@section('content')
    <div class="header pb-2 pt-5 pt-lg-6 d-flex align-items-center">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-md-11">
                    <br>
                    <h1 class="display-1 text-white">{{ $materia->nombre_materia }}</h1>
                    <h3 class="text-white">{{ $materia->clave_materia }}</h3>
                    <p class="text-white mt-0 mb-5">{{ $materia->descripcion }}</p>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('maestros.materias.show', $materia) }}" class="btn btn-primary">
                                <i class="fas fa-chevron-circle-left"></i> Regresar
                            </a>
                        </div>

                    </div>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <br><br><br>
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-5 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="card-body pt-0 pt-md-4">
                            <img class="card-img-top" src="../../assets/img/theme/img-1-1000x600.jpg" alt="Card image cap">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center">
                                        <h1>Sellecionar Imagen de Materia</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <form action="{{ route('maestros.materias.edit', $materia) }}" method="POST">
                                    @csrf
                                    <div class="form-group custom-file">
                                        <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                                        <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
                                    </div>
                                    <h1> </h1>
                                    <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 order-xl-1">
                    <div class="card card-profile shadow">
                        <div class="card-body pt-0 pt-md-4">
                            <div class="text">
                                <form action="{{ route('maestros.materias.update', $materia) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="card-profile-stats d-flex justify-content-center">
                                        <h1>Editar Información</h1>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label class="form-control-label">Clave de la Materia</label><label>*</label>
                                            <input class="form-control form-control-sm "
                                                value="{{ $materia->clave_materia }}" type="text" id="clave_materia"
                                                name="clave_materia" required>
                                            @error('clave_materia')
                                                <br>
                                                <span class="text-danger">{{ $message }}</span>
                                                <br>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label class="form-control-label">Nombre de la Materia</label><label>*</label>
                                            <input class="form-control form-control-sm "
                                                value="{{ $materia->nombre_materia }}" type="text" id="nombre_materia"
                                                name="nombre_materia" required>
                                            @error('nombre_materia')
                                                <br>
                                                <span class="text-danger">{{ $message }}</span>
                                                <br>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Descripción del Curso</label>
                                        <textarea class="form-control form-control-sm" name="descripcion" id="descripcion"
                                            rows="4">{{ $materia->descripcion }}</textarea>
                                        @error('descripcion')
                                            <br>
                                            <span class="text-danger">{{ $message }}</span>
                                            <br>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label class="form-control-label">Cantidad de Unidades en la Materia</label>
                                            <input type="number" name="cantUni" id="cantUni" min="0" max="10"
                                                value="{{ $materia->cantUni }}">
                                            @error('cantUni')
                                                <br>
                                                <span class="text-danger">{{ $message }}</span>
                                                <br>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-control-label">Cantidad Máxima de Alumnos en la
                                                Materia</label>
                                            <input type="number" name="maxAlu" id="maxAlu" min="10" max="50"
                                                value="{{ $materia->maxAlu }}">
                                            @error('maxAlu')
                                                <br>
                                                <span class="text-danger">{{ $message }}</span>
                                                <br>
                                            @enderror
                                        </div>
                                    </div>
                                    <h5>*Obligatorios</h5>
                                    <button type="button" class="btn btn-primary btn-warning mb-3" data-toggle="modal"
                                        data-target="#modal-notification"><i class="fas fa-exclamation-triangle"></i>
                                        Eliminar</button>
                                    <button type="submit" class="btn btn-primary btn-succes mb-3">Actualizar
                                        Información</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
            aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="py-3 text-center">
                            <i class="fas fa-exclamation-triangle"></i>
                            <h4 class="heading mt-4">¿Seguro que desea eliminar la clase {{ $materia->nombre_materia }}?
                            </h4>
                            <p>Al dar click en aceptar se eliminaran todos los datos de la materia
                                incluido tareas, clases, examenes y la lista de alumnos y asistencia.</p>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <form action="{{ route('maestros.materias.destroy', $materia) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-white">Aceptar, borrar la Materia</button>
                        </form>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cancelar</button>
                    </div>

                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>

@endpush
