@extends('adminlte::page')

@section('title', 'ESPE')

@section('content_header')
    <h1>Editar Participante</h1>
@stop

@section('content')

@if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>

        </div>
@endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($participante,['route' => ['admin.participantes.update',  $participante], 'method' => 'put']) !!}
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

                {!! Form::submit('Actualizar Datos', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>
    </div>



@stop

