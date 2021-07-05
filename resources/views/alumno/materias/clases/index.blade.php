@extends('layouts.app')
@section('css')

@endsection
@section('content')
    @include('layouts.headers.cards')
    <div class="container">
        <div class="container card">
            <br>
            <div class="card-header">
                <h1 class="card-title">Clases de {{ $materia->nombre_materia }}</h1>
                <a class="btn btn-secondary" href="{{ route('alumnos.materias.show', $materia) }}"> Regresar </a>
            </div>
            <div class="card-body">
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="Actuales" data-toggle="tab"
                                href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                aria-selected="true">Actuales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="Proximas" data-toggle="tab" href="#tabs-icons-text-2"
                                role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Proximas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="Pasadas" data-toggle="tab" href="#tabs-icons-text-3"
                                role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">Pasadas</a>
                        </li>
                    </ul>
                </div>
                <br>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                aria-labelledby="Actuales">
                                @foreach ($clases as $clase)
                                    @if (now()->toDateString() >= $clase->diaHoraInicial)
                                        @if (now()->toDateString() <= $clase->diaHoraFinal)
                                            <div class="card bg-gradient-default ">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <a href="#" class="avatar avatar-xl rounded-circle">
                                                                <img alt="" src="../../assets/img/theme/img-1-1000x600.jpg">
                                                            </a>
                                                        </div>
                                                        <div class="col ml--2">
                                                            <h4 class="mb-0 text-white">
                                                                <a class="text-white" href="{{ $clase->linkUrl }}">{{ $clase->tema }}</a>
                                                            </h4>
                                                            <p class="text-sm text-muted mb-0 text-white">
                                                                {{ $clase->diaHoraInicial }} hasta
                                                                {{ $clase->diaHoraFinal }}  
                                                            </p>
                                                            <span class="text-success">●</span>
                                                            <small class="text-white">Activa</small>
                                                        </div>
                                                        <div class="col-auto">
                                                            <a href="#" type="button" class="btn btn-primary btn-sm"><i
                                                                    class="fas fa-arrow-circle-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="Proximas">
                                @foreach ($clases as $clase)
                                    @if ($clase->diaHoraInicial >= now()->toDateString())
                                        <div class="card bg-gradient-default ">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <a href="#" class="avatar avatar-xl rounded-circle">
                                                            <img alt="" src="../../assets/img/theme/img-1-1000x600.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="col ml--2">
                                                        <h4 class="mb-0 text-white">
                                                            <a class="text-white" href="#">{{ $clase->tema }}</a>
                                                        </h4>
                                                        <p class="text-sm text-muted mb-0 text-white">
                                                            {{ $clase->diaHoraInicial }} hasta
                                                            {{ $clase->diaHoraFinal }}
                                                        </p>
                                                        <span class="text-white">●</span>
                                                        <small class="text-white">Proxima</small>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a type="button" href="#" class="btn btn-primary btn-sm"><i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="Pasadas">
                                @foreach ($clases as $clase)
                                    @if ($clase->diaHoraFinal <= now()->toDateString())
                                        <div class="card bg-gradient-default ">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <a href="#" class="avatar avatar-xl rounded-circle">
                                                            <img alt="" src="../../assets/img/theme/img-1-1000x600.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="col ml--2">
                                                        <h4 class="mb-0 text-white">
                                                            <a class="text-white" href="#">{{ $clase->tema }}</a>
                                                        </h4>
                                                        <p class="text-sm text-muted mb-0 text-white">
                                                            {{ $clase->diaHoraInicial }} hasta
                                                            {{ $clase->diaHoraFinal }}
                                                        </p>
                                                        <span class="text-danger">●</span>
                                                        <small class="text-white">Pasada</small>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a type="button" href="#" class="btn btn-primary btn-sm"><i
                                                                class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>
        <br><br>
        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
