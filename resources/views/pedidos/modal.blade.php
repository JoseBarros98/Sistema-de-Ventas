<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$pedido->id}}">

    {{Form::open(array('action'=>array('PedidoController@destroy',$pedido->id),'method'=>'delete'))}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title">Cancelar Pedido</h4>
                </div>
                <div class="modal-body">
                <p>Confirme si desea Cancelar el Pedido</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>

    {{Form::close()}}

</div>