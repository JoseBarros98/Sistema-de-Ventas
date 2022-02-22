@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col.xs.12">
            <h3>Listado de Pedidos <a href="pedido/create"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('compras.ingreso.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Nombre</th>
                        <th>Fecha de Entrega</th>
                        <th>Fecha de Pedido</th>
                        <th>Cliente</th>
                        <th>Comprobante</th>
                        <th>Muestra</th>
                        <th>Descripcion de muestra</th>
                        
                        <th>Opciones</th>
                    </thead>
                    @foreach( $pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->nombre_pedido}}</td>
                        <td>{{ $pedido->fecha_pedido}}</td>
                        <td>{{ $pedido->fecha_entrega}}</td>
                        
                        @foreach ($persona as $per )
                            @if ($per->idpersona == $pedido->idcliente)
                            <td>{{$per->nombre}}</td>
                            @endif
                        @endforeach
                                
                           
                        <td>{{ $pedido->tipo_comprobante.":" .$pedido->num_comprobante}}</td>
                        <td>{{ $pedido->muestra}}</td>
                        <td>{{ $pedido->detalle_muestra}}</td>
                        
                        <td class=" col-md-2">
                            <a href="{{URL::action('PedidoController@show',$pedido->id)}}"><button class="btn btn-primary">Detalles</button></a>
                            <a href="" data-target="#modal-delete-{{$pedido->id}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
                        </td>
                    </tr>
                    @include('pedidos.modal')
                    @endforeach
                </table>
            </div>
            {{$pedidos->render()}}
        </div>
    </div>
@endsection