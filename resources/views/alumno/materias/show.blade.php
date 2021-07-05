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
                    <h3 class="text-white">{{$materia->clave_materia }}</h3>
                    <p class="text-white mt-0 mb-5">{{ $materia->descripcion }}</p>
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
                        <div class="card-body text-center ">
                            <h1>Alumnos Inscritos</h1>
                            <a href="{{ route('alumnos.materias.alumnos.index', $materia->id) }}"
                                class="btn-block btn btn-primary btn-sm">
                                <i class="fas fa-users"></i> Ver Alumnos
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No. Control</th>
                                            <th scope="col">Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($materia->users as $us)
                                            <tr>
                                                <td>{{ $us->nocontrol }}</td>
                                                <td>{{ $us->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body text-center ">
                            <h1>Clases</h1>
                            <a href="{{ route('alumnos.materias.clases.index', $materia->id) }}"
                                class="btn-block btn btn-primary btn-sm">
                                <i class="fas fa-users"></i> Ver Clases
                            </a>
                        </div>
                        <div class="card-body">
                            @foreach ($clases as $clase)
                                <div class="card bg-gradient-default ">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-white">{{ $clase->tema }}</h4>
                                                @if ($clase->diaHoraInicial <= now()->toDateString() && $clase->diaHoraFinal >= now()->toDateString())
                                                    <span class="text-success">●</span>
                                                    <small class="text-white">Activa</small>
                                                @elseif($clase->diaHoraInicial > now()->toDateString())
                                                    <span class="text-white">●</span>
                                                    <small class="text-white">Próxima</small>
                                                @elseif($clase->diaHoraFinal < now()->toDateString())
                                                        <span class="text-danger">●</span>
                                                        <small class="text-white">Pasada</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 order-xl-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="text">
                                @foreach ($posts as $post)
                                    <div class="card border-10" style="background-color: #e9ecef;">                                                                                
                                        <div class="card-body">
                                            <a class="h2 card-title mb-2" href="#">{{ $post->nombre_post }}</a>
                                            @if ($post->status === "2")
                                                <span class="badge badge-primary">Publicación</span>
                                            @elseif($post->status === "1")
                                                <span class="badge badge-danger">Tarea</span>
                                            @endif                                            
                                            <p class="card-text">{{ $post->asunto }}</p>
                                            <p class="card-text text-sm font-weight-bold">{{ $post->updated_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            </div>
                        </div>
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

@endpush
