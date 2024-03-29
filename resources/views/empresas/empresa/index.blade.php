@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col.xs.12">
            <h3>Listado de Empresas <a href="empresa/create"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('empresas.empresa.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Nombre</th>
                        <th>Nit</th>
                        <th>Celular/Teléfono</th>
                        <th>pais</th>
                        <th>Acciones</th>
                        
                    </thead>
                    
                    @forelse( $enterprises as $ent)
                    <tr>
                        <td>{{ $ent->nombre}}</td>
                        <td>{{ $ent->nit}}</td>
                        <td>{{ $ent->telefono}}</td>
                        
                        @foreach($nacionalidads as $nac)
                            @if($ent->pais == $nac->id)
                                <td>{{ $nac->pais }}</td>
                            @endif
                        @endforeach
                        
                        <td>
                            <a href="{{URL::action('EnterpriseController@edit',$ent->id)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$ent->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                       
                        @include('empresas.empresa.modal')
                        @empty
                        @endforelse
                    </tr>
                    
                </table>
            </div>
            {{$enterprises->render()}}
        </div>
    </div>
@endsection