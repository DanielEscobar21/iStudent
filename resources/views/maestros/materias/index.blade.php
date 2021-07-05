@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-sm-8">
            <div class="input-group mb-3">
            </div>
        </div>
        <div class="col-sm-4">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal"class="btn btn-icon btn-primary" type="button">
                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                <span class="btn-inner--text">Agregar</span>
            </button>
        </div>  
    </div>    
    <!--Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Materia</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('maestros.materias.store')}}" method="POST" >
                    @csrf
                    <div class="form-group ">
                        <label class="form-control-label">Clave de la Materia</label><label>*</label>
                        <input class="form-control form-control-sm " type="text" id="clave" name="clave_materia" required>
                        @error('clave_materia')
                            <br>
                            <span class="text-danger">{{$message}}</span>
                            <br>
                        @enderror
                    </div>                        
                    <div class="form-group ">
                        <label class="form-control-label">Nombre de la Materia</label><label>*</label>
                        <input class="form-control form-control-sm " name="nombre_materia" type="text" id="nombreClase" required>
                        @error('clave_materia')
                            <br>
                            <span class="text-danger">{{$message}}</span>
                            <br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Descripción del Curso</label>
                        <textarea class="form-control form-control-sm" name= "descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <h5>*Obligatorios</h5>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear Materia</button>
                    </div>
                </form>
            </div>            
          </div>
        </div>
      </div>
    <br>
    <div class="container">
        <div class="card-deck row">
            @foreach($materias as $materia)
            <div class="card col">                            
                <div class="card-body">
                    <img class="card-img-top" src="../../assets/img/theme/img-1-1000x600.jpg" alt="Card image cap">
                    <h5 class="card-title">{{$materia->clave_materia}}</h5>
                    <h3 class="card-title">{{$materia->nombre_materia}}</h3>
                    <p class="card-text">{{$materia->descripcion}}</p>
                    <a href="{{route('maestros.materias.show', $materia->id)}}" class="btn btn-primary">Ingresar</a>
                </div>
            </div>
            @endforeach       
        </div>
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