@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container">
        <div class="card-deck row">
            @foreach ($users->materias as $mat)
                <div class="card col">
                    <div class="card-body">
                        <img class="card-img-top" src="../../assets/img/theme/img-1-1000x600.jpg" alt="Card image cap">
                        <h5 class="card-title">{{ $mat->clave_materia }}</h5>
                        <h3 class="card-title">{{ $mat->nombre_materia }}</h3>
                        <p class="card-text">{{ $mat->descripcion }}</p>
                        <a href="{{ route('alumnos.materias.show', $mat->id) }}" class="btn btn-primary">Ingresar</a>
                    </div>
                </div>
            @endforeach
        </div>
        @include('layouts.footers.auth')
    </div>

@endsection
@push('js')
    <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
