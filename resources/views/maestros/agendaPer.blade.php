@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container">
  <div class="card">
    <div class="card-body">
      <div id="agenda">

      </div>
    </div>
  </div>
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar un evento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="">
                  {!! csrf_field()!!}
                    <div class="form-group">
                        <label class="form-control-label">Título del evento</label>
                        <input class="form-control form-control-sm " type="text" id="title" name="title" required>
                        <small id="helpId" class="form-text text-muted">Help Text</small>
                    </div>                        
                    <div class="form-group">
                        <label class="form-control-label">Descripcion</label>
                        <textarea class="form-control form-control-sm" rows="3" name="descripcion" id="descripcion" required></textarea>
                    </div>
                    <div class ="form-group">
                        <label class="form-control-label">Inicia</label>
                        <input class="form-control form-control-sm"  name="start" id="start" required>
                        <small id="helpId" class="form-text text-muted">Help Text</small>
                    </div>
                    <div class ="form-group">
                        <label class="form-control-label">Termina</label>
                        <input class="form-control form-control-sm"  name="end" id="end" required>
                        <small id="helpId" class="form-text text-muted">Help Text</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
              <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
              <button type="button" class="btn btn-danger" id="btnEliminar"><i class="fas fa-trash"></i></button>              
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
@include('layouts.footers.auth')   
</div>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>>
@endpush