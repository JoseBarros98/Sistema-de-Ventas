@extends ('layouts.admin')
@section ('contenido')

<div class="row">
   
   <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <div class="form-group">
         <label for="nombre">Cliente</label>
            @foreach ($pedidos as $f)
               {{ $f->nombre }}
            @endforeach
               
      </div>
   </div>

   <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <div class="form-group">
         <label for="nombre">Nombre de Pedido</label>
            @foreach ($pedidos as $f)
               {{ $f->nombre_pedido }}
            @endforeach
               
      </div>
   </div>

   <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <div class="form-group">
         <label for="nombre">N° celular del cliente</label>
         @foreach ($pedidos as $z)
         
               
                  <p> {{ $z->telefono }}</p>
               
            
         @endforeach
      </div>
   </div>

   <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
      <div class="form-group">
         <label>Fecha de entrega</label>
            <p> 
               @foreach ($pedidos as $f)
                  {{ $f->fecha_entrega }}
               @endforeach
            </p>
      </div>
   </div>

   <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
      <div class="form-group">
         <label for="num_comprobante">Fecha de pedido</label>
            <p>
               @foreach ($pedidos as $e)
                  {{$e->fecha_pedido}} 
               @endforeach
            </p>
      </div>
   </div>

   <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
      <div class="form-group">
         <label for="num_comprobante">Imagen de muestra</label>
            <p>
               @foreach ($pedidos as $e)
                  {{$e->muestra}} 
               @endforeach
            </p>
      </div>
   </div>

   <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
      <div class="form-group">
         <label for="num_comprobante">Detalles de la muestra</label>
            <p>
               @foreach ($pedidos as $e)
                  {{$e->detalle_muestra}} 
               @endforeach
            </p>
      </div>
   </div>

</div>

<div class="row">
            <div class="panel panel-primary">
            <div class="panel-body">
             
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color: #A9D0F5">
            
            <th>Descripcion</th>
            <th>Tipo de tela</th>
            <th>Color de tela</th>
            <th>Talles</th>
            <th>Cantidad</th>
            <th>Saldo</th>
            <th>Debe</th>
            <th>Precio Total</th>
            
            </thead>
            <tfoot>
            
            <th></th>
            
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            
            <th><h4 id="total"> <b>Total</b>
               
               @foreach($detalles as $detalle)
                  {{$detalle->precio_total }}
               @endforeach 
                  
              
               
            </h4></th>
            
            </tfoot>
            
            <tbody> 
              @foreach($detalles as $detalle)
              <tr>
               <td>{{ $detalle->descripcion}}</td>
               
                  
                     <td>{{ $detalle->nombre_tela}}</td>
                     <td>{{ $detalle->color_tela}}</td>
                  
                
                <td>{{ $detalle->n_talla}}</td>
                <td>{{ $detalle->cantidad_talla}}</td>
                
                <td>{{ $detalle->saldo}}</td>
                <td>{{ $detalle->debe}}</td>
                <td>{{ $detalle->precio_total}}</td>
                <td></td>
                
                
                
              </tr>
              @endforeach             
            </tbody> 
            </table>
            </div>
            </div>
            
            </div>
            
            </div>
           
            </div>
   
         @endsection