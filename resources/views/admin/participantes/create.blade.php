@extends('adminlte::page')

@section('title', 'ESPE')

@section('content_header')
    <h1>Crear Participante</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.participantes.store']) !!}
                <div class="form-group">
                        {!! Form::label('nombre','Nombre') !!}
                        {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder'=> 'Ingrese el nombre del participante']) !!}

                        @error('nombre')
                        <span class="text-danger">{{$message}}</span>

                        @enderror

                </div>

                <div class="form-group">
                        {!! Form::label('cedula','Cedula') !!}
                        {!! Form::text('cedula',null,['class' => 'form-control', 'placeholder'=> 'Ingrese la cedula del participante']) !!}

                        @error('cedula')
                        <span class="text-danger">{{$message}}</span>

                        @enderror

                </div>

                {!! Form::submit('Crear Participante', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>
    </div>
@stop

