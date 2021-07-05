@extends('layouts.app')
@section('css')

@endsection
@section('content')
    @include('layouts.headers.cards')
    <div class="container">
        <div class="container card">
            <br>
            <div class="card-header">
                <h1 class="card-title">{{ $post->nombre_post }}</h1>
                <a class="btn btn-secondary" href="#"> Regresar
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('maestros.materias.posts.store', $materia->id) }}" method="POST">
                    @csrf
                    <input class="form-control" type="hidden" value="{{ $materia->id }}" id="id_materia" name="id_materia"
                        readonly="readonly" disabled>
                    <div class="form-group">
                        <label class="form-control-label">Nombre del Post</label>
                        <input type="text" name="nombre_post" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Asunto</label>
                        <input type="text" name="asunto" class="form-control form-control-sm">
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="unidad_post" class="form-control-label ">Unidad</label>
                            <select name="unidad_post" class="form-control form-control-sm">
                                <option value="null">Ninguna</option>
                                @for ($i = 0; $i < $materia->cantUni; $i++)
                                    <option value="{{ $i + 1 }}">{{ $i + 1 }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col">
                            <p class="form-control-label ">Estado</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="status"
                                    class="custom-control-input" value="1" selected>
                                <label class="custom-control-label"  for="customRadioInline1">Tarea</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="status"
                                    class="custom-control-input" value="2" checked>
                                <label class="custom-control-label" for="customRadioInline2">Publicación</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Cuerpo del Post</label>
                        <textarea id="body" name="body" class="form-control form-control-sm"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">Publicar</button>
                    </div>
                </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });

    </script>
@endpush
