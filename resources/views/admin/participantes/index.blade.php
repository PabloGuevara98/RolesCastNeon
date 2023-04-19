@extends('adminlte::page')

@section('title', 'ESPE')

@section('content_header')
  @can('admin.participantes.create', )
    <a href="{{route('admin.participantes.create')}}" class="btn btn-secondary btn-sm float-right">Agregar Participante</a>

  @endcan
<h1>Mostrar Listado de Participantes</h1>

@stop

@section('content')

@if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>

        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cedula</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($participantes as $participante)
                    <tr>
                        <td>{{$participante->id}}</td>
                        <td>{{$participante->nombre}}</td>
                        <td>{{$participante->cedula}}</td>
                        <td width="10px">
                            @can('admin.participantes.edit')
                                <a class="btn btn-primary btn-sm" href="{{route('admin.participantes.edit', $participante)}}">Editar</a>

                            @endcan
                            </td>
                            @can('admin.participantes.destroy')
                                <td width="10px">
                                    <form action="{{route('admin.participantes.destroy', $participante)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>

                            @endcan
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@stop
