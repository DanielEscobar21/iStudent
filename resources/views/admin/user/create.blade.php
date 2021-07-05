@extends('adminlte::page')

@section('title', 'iStudent Administrador')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.user.store']) !!}
                <div class="row form-group">
                    <div class="col">
                        {!! Form::label('name', 'Nombre Completo') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col">
                        {!! Form::label('nocontrol', 'Número de Control') !!}
                        {!! Form::text('nocontrol', null, ['class' => 'form-control']) !!}
                        @error('nocontrol')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>                                        
                </div>                
                <div class="form-group">
                    {!! Form::label('email', 'Correo Electronico') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    @error('email')
                            <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password',['class' => 'form-control']) !!}
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>                             
                <div class="form-group">
                    {!! Form::label('role', 'Rol') !!}
                    {!! Form::select('role', ['3' => 'Administrador', '1' => 'Estudiante', '2' => 'Maestro'], null, ['class' => 'form-select'])!!}
                </div>
                {!! Form::submit('Registrar Usuario', ['class'=> 'btn btn-primary']) !!}                
            {!! Form::close() !!}
        </div>
    </div>
@stop
