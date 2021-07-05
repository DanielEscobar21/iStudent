@extends('layouts.app')
@section('css')

@endsection
@section('content')
    @include('layouts.headers.cards')
    <div class="container">
        <div class="container card">
            <br>
            <div class="card-header">
                <h1 class="card-title">{{ $clase->tema }}</h1>
                <a class="btn btn-secondary" href="{{ route('maestros.materias.clases.index', $materia->id) }}"> Regresar
                </a>
            </div>
            <div class="card-body">

            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
