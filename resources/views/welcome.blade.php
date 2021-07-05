@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <img class="logo" src="{{ asset('argon') }}/img/LogoWHITE.png" width="150" height="150">
                        <h1 class="text-white">{{ __('Bienvenido a iStudent') }}</h1>
                        <h2 class="text-white">{{ __('Un servicio de Estudiantes para Estudientes') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
