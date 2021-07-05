@extends('layouts.app')
@section('css')

@endsection
@section('content')
    @include('layouts.headers.cards')
    <div class="container">
        <div class="container card">
            <br>
            <div class="card-header">
                <h1 class="card-title">Agendar nueva clase en {{ $materia->nombre_materia }}</h1>
                <a class="btn btn-secondary" href="{{ route('maestros.materias.clases.index', $materia->id) }}"> Regresar
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('maestros.materias.clases.store', $materia) }}" method="POST">
                    @csrf
                    <input class="form-control" type="hidden" value="{{ $materia->id }}" id="id_materia" name="id_materia"
                        readonly="readonly" disabled>
                    <div class="row">
                        <div class="form-group col">
                            <label for="nombre_materia" class="form-control-label">Materia</label>
                            <input class="form-control" type="text" value="{{ $materia->nombre_materia }}"
                                id="nombre_materia" readonly="readonly">
                        </div>
                        <div class="form-group col">
                            <label for="tema" class="form-control-label">Tema*</label>
                            <input class="form-control" type="text" id="tema" name="tema">
                            @error('tema')
                                <br>
                                <span class="text-danger">{{ $message }}</span>
                                <br>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="diaHoraInicial" class="form-control-label">Inicio*</label>
                            <input class="form-control" type="datetime-local" id="diaHoraInicial" name="diaHoraInicial">
                            @error('diaHoraInicial')
                                <br>
                                <span class="text-danger">{{ $message }}</span>
                                <br>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="diaHoraFinal" class="form-control-label">Final*</label>
                            <input class="form-control" type="datetime-local" id="diaHoraFinal" name="diaHoraFinal">
                            @error('diaHoraFinal')
                                <br>
                                <span class="text-danger">{{ $message }}</span>
                                <br>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="linkUrl" class="form-control-label">Link Clase</label>
                            <input class="form-control" type="url" id="linkUrl" name="linkUrl">
                            @error('linkUrl')
                                <br>
                                <span class="text-danger">{{ $message }}</span>
                                <br>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="unidad" class="form-control-label">Unidad</label>
                            <select name="unidad" class="form-control">
                                <option value="null">Ninguna</option>
                                @for ($i = 0; $i < $materia->cantUni; $i++)
                                    <option value="{{ $i + 1 }}">{{ $i + 1 }}</option>
                                @endfor
                            </select>
                            @error('unidad')
                                <br>
                                <span class="text-danger">{{ $message }}</span>
                                <br>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="informacion">Información</label>
                        <textarea class="form-control" id="informacion" name="informacion" rows="3"></textarea>
                        @error('informacion')
                            <br>
                            <span class="text-danger">{{ $message }}</span>
                            <br>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">Agendar Clase</button>
                    </div>
                </form>
                <div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
