@extends('adminlte::page')

@section('title', 'ESPE')

@section('content_header')
    @can('admin.jurados.create')
        <a href="{{route('admin.jurados.create')}}" class="btn btn-secondary btn-sm float-right">Agregar Jurado</a>

    @endcan
    <h1>Lista de Jurados</h1>
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
                    @foreach($jurados as $jurado)
                    <tr>
                        <td>{{$jurado->id}}</td>
                        <td>{{$jurado->nombre}}</td>
                        <td>{{$jurado->cedula}}</td>
                        <td width="10px">
                            @can('admin.jurados.edit')
                                <a class="btn btn-primary btn-sm" href="{{route('admin.jurados.edit', $jurado)}}">Editar</a>

                            @endcan
                            </td>
                            @can('admin.jurados.destroy')
                                <td width="10px">
                                    <form action="{{route('admin.jurados.destroy', $jurado)}}" method="POST">
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
