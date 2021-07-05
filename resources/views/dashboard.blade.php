@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container">
        <div class="card">
            <div class="card-body text-center">
                <h1 class="display-1">Bienvenido 
                    @if (auth()->user()->role===1)
                        Estudiante
                    @elseif(auth()->user()->role===2)
                        Maestro
                    @elseif(auth()->user()->role===3)
                        Administrador
                    @endif
                </h1>
                <h2 class="display-1">{{auth()->user()->name}}</h2>
            <h1>
                iStudent es una platafomra para poder conectar con tus 
                @if (auth()->user()->role===1)
                maestros
                @elseif(auth()->user()->role===2)
                estudiantes
                @endif
                para poder tener un mejor control de lo que ocurre dentro y fuera del aula.
            </h1>
            <h2>
                Aquí podras manegar cada una de tus materias, clases e información que quieras compartir con tus 
                @if (auth()->user()->role===1)
                maestros.
                @elseif(auth()->user()->role===2)
                estudiantes.
                @endif 
            </h2>
        </div>

        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush