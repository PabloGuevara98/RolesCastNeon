@extends('adminlte::page')

@section('title', 'ESPE')

@section('content_header')
    @can('admin.casts.create')
        <a href="{{route('admin.casts.create')}}" class="btn btn-secondary btn-sm float-right">Agregar Cast</a>
    @endcan
    <h1>Lista de Casts</h1>
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
                        <th>Fecha</th>
                        <th>Participantes</th>
                        <th>Slug</th>
                        <th colspan="2"></th>
                    </tr>

                </thead>

                <tbody>
                    @foreach($casts as $cast)
                        <tr>
                            <td>{{$cast->id}}</td>
                            <td>{{$cast->nombre}}</td>
                            <td>{{$cast->fecha}}</td>
                            <td>{{$cast->participantes}}</td>
                            <td>{{$cast->slug}}</td>
                            <td width="10px">
                                @can('admin.casts.edit')
                                <a class="btn btn-primary btn-sm" href="{{route('admin.casts.edit', $cast)}}">Editar</a>
                                @endcan

                            </td>
                            @can('admin.casts.destroy')
                                <td width="10px">
                                    <form action="{{route('admin.casts.destroy', $cast)}}" method="POST">
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

