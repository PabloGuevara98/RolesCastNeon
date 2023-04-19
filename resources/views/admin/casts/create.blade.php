@extends('adminlte::page')

@section('title', 'ESPE')

@section('content_header')
    <h1>Crear Nuevo Cast</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.casts.store']) !!}
                <div class="form-group">
                    {!! Form::label('nombre','Nombre') !!}
                    {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder'=> 'Ingrese el nombre del cast']) !!}

                    @error('nombre')
                    <span class="text-danger">{{$message}}</span>

                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('slug','Slug') !!}
                    {!! Form::text('slug',null,['class' => 'form-control', 'placeholder'=> 'Ingrese el slug del cast', 'readonly']) !!}

                    @error('slug')
                    <span class="text-danger">{{$message}}</span>

                    @enderror


                </div>

                <div class="form-group">
                    {!! Form::label('participantes','Participantes') !!}
                    {!! Form::number('participantes', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de participantes', 'min' => 1]) !!}


                    @error('participantes')
                    <span class="text-danger">{{$message}}</span>

                    @enderror


                </div>


                <div class="form-group">
                    {!! Form::label('fecha','Fecha') !!}
                    {!! Form::date('fecha', null, ['class' => 'form-control', 'placeholder' => 'Seleccione la fecha del cast']) !!}


                    @error('fecha')
                    <span class="text-danger">{{$message}}</span>

                    @enderror
                   

                </div>

                {!! Form::submit('Crear Cast', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
            

        </div>
    </div>
@stop


@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
