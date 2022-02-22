@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col.xs.12">
            <h3>Listado de telas <a href="tela/create"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('almacen.tela.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Nombre</th>
                        <th>Color</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach( $telas as $tel)
                    <tr>
                        <td>{{ $tel->nombre_tela}}</td>
                        <td>{{ $tel->color_tela}}</td>
                        <td>
                            <a href="{{URL::action('TelaController@edit',$tel->id)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$tel->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('almacen.tela.modal')
                    @endforeach
                </table>
            </div>
            {{$telas->render()}}
        </div>
    </div>
@endsection