@extends ('layouts.admin')
@section ('contenido')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h3>Nuevo Pedido</h3>
      @if (count($errors)>0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @include('sweetalert::alert')

      @if(session('success_message'))
        <div class="alert alert-success">
          {{ session('success_message')}}
        </div>
      @endif 
  </div>
</div>

{!!Form::open(array('url'=>'pedidos/pedido','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}

  <div class="row">
    
    <div class="col-lg-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="nombre">Nombre de pedido</label>
        <input type="text" name="nombre_pedido" required value="{{old('nombre_pedido')}}" class="form-control" placeholder="Nombre de Pedido..">
      </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="nombre">Cliente</label>
          <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
            @foreach($persona as $per)
              <option value="{{$per->idpersona}}"> {{$per->nombre}} </option>
            @endforeach
          </select>
      </div>
    </div>
    
    <div class="col-lg-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="nombre">Fecha de PEDIDO</label>
        <input type="date" name="fecha_pedido" required value="{{old('fecha_pedido')}}" class="form-control" >
      </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="nombre">Fecha de ENTREGA</label>
        <input type="date" name="fecha_entrega" required value="{{old('fecha_entrega')}}" class="form-control" >
      </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label>Tipo de Comprobante</label>
          <select name="tipo_comprobante" class="form-control">
            <option value="Boleta">Boleta</option>
            <option value="Factura">Factura</option>
            <option value="Ticket">Ticket</option>
          </select>
      </div>
    </div>
            
    <div class="col-lg-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="num_comprobante">Numero del Comprobante</label>
          <input type="text" name="num_comprobante" required value="{{old('num_comprobante')}}" class="form-control" placeholder="Numero del Comprobante..">
      </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-xs-12">
      <div class="form-group">
           <label for="imagen">Imagen</label>
           <input type="file" name="muestra" class="form-control">
      </div>
  </div>

  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <div class="form-group">
      <label for="detalle_muestra">Detalles de la imagen</label>
        <input type="textarea" name="detalle_muestra" required value="{{old('detalle_muestra')}}" class="form-control" placeholder="Detalles de la muestra">
    </div>
  </div>


</div>

<div class="row">

  <div class="panel panel-primary">
    <div class="panel-body">
      <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label>Descripción</label>
            <input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion del pedido..">
        </div>
      </div>
    
      <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="tela">Tipo de Tela</label>
            <select name="tipo_tela" id="tipo_tela" class="form-control selectpicker" data-live-search="true">
              @foreach ($telas as $tela)
                <option value="{{$tela->id}}">{{$tela->nombre_tela}}</option>
              @endforeach
            </select>  
        </div>
      </div>
      
      <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="precio_total">Precio total</label>
            <input type="textarea" name="precio_total" required value="{{old('precio_total')}}" class="form-control" placeholder="precio total">
        </div>
      </div>

      <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="saldo">Saldo</label>
            <input type="textarea" name="saldo" required value="{{old('saldo')}}" class="form-control" placeholder="Saldo">
        </div>
      </div>

      <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="saldo">Firma Cliente</label>
            <input type="textarea" name="Firma_Cliente" required value="{{old('Firma_cliente')}}" class="form-control" >
        </div>
      </div>

      <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="saldo">Firma Gerente General</label>
            <input type="textarea" name="Firma_Gerente" required value="{{old('Firma_Gerente')}}" class="form-control" >
        </div>
      </div>

      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <button class="btn btn-primary" type="button" id="bt_add">Agregar</button>
        </div>
      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color: #A9D0F5">
              <th>Opciones</th>
              <th>Descripcion</th>
              <th>Tipo de tela</th>
              <th>Saldo</th>
              <th>Debe</th>
              <th>Firma Cliente</th>
              <th>Firma Gerente</th>
              <th>Subtotal</th>
            </thead>
            
            <tfoot>
              <th>TOTAL</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th><h4 id="total">Bs/. 0.00</h4></th>
              </tfoot>
              <tbody>              
              </tbody>
          </table>
        </div>

  <div class="panel panel-primary">
    <label for="Talles">TALLES DE PEDIDO</label>
    <div class="panel-body">
      <div class="col-lg-6 col-sm-6 col-xs-12">
        
        <div class="form-group">
          <label>Talles</label>
          <select name="n_talla" id="n_talla" class="form-control selectpicker" data-live-search="true">
            
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
              <option value="XXXL">XXXL</option>
            
          </select>  
          
        </div>
      </div>
      
      
      
      <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="Talles">Cantidad de talles</label>
            <input type="text" name="cantidad_talla" id="cantidad_talla" class="form-control">
        </div>
      </div>
    
      <div class="col-xs-12">
        <div class="form-group">
          <button class="btn btn-primary" type="button" id="bt_add2">Agregar</button>
        </div>
      </div>
      
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table id="detalles2" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color: #A9D0F5">
              <th>Opciones</th>
              <th>Talles</th>
              <th>Cantidad</th>
            </thead>
            
            <tfoot>
              <th>TOTAL</th>
              <th></th>
            </tfoot>
            <tbody>              
            </tbody>
          </table>
        </div>
      </div>
    </div>
      <label for="Servicio">SERVICIO DE:</label>
      <div class="panel-body">
        
        <div class="col-lg-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="Talles">Detalle</label>
            <select name="detalle_serv" id="detalle_serv" class="form-control selectpicker" data-live-search="true">
            
              <option value="Bolsillo Izq">Bolsillo Izq</option>
              <option value="Bolsillo Der">Bolsillo Der</option>
              <option value="Pecho Izq">Pecho Izq</option>
              <option value="Pecho Der">Pecho Der</option>
              <option value="Espalda">Espalda</option>
              <option value="Manga Izq">Manga Izq</option>
              <option value="Manga Der">Manga Der</option>
              <option value="Pierna Izq">Pierna Izq</option>
              <option value="Pierna Der">Pierna Der</option>
              <option value="Cuello">Cuello</option>
              <option value="Nombres">Nombres</option>
            
          </select>  
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
          
          <div class="form-group">
            <label>Descripción </label>
              <input type="textarea" name="descripcion_serv" required value="{{old('descripcion_serv')}}" class="form-control" placeholder="Descripcion del pedido..">
          </div>
        </div>
      
        <div class="col-xs-12">
          <div class="form-group">
            <button class="btn btn-primary" type="button" id="bt_add1">Agregar</button>
          </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
            <table id="detalles3" class="table table-striped table-bordered table-condensed table-hover">
              <thead style="background-color: #A9D0F5">
                <th>Opciones</th>
                <th>Detalle</th>
                <th>Descripcion</th>
              </thead>
              
              <tfoot>
                <th>TOTAL</th>
                <th></th>
              </tfoot>
              <tbody>              
              </tbody>
            </table>
          </div>
          
            
      </div>

      

    </div>
    
  </div>

  

      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">         
        <div class="form-group">
          <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
      </div>
  </div>
{!!Form::close()!!}  

@push ('scripts')
  <script>
    $(document).ready(function(){
    $('#bt_add').click(function(){
      agregar();
      });
    });

  var cont=0;
  total=0;
  subtotal=[];
  $("#guardar").hide();

  function agregar(){
    datosPedido=document.getElementById('id').value.split('_');
    idpedido=datosPedido[0];
    descripcion=$("#descripcion").text();
    tipo_tela=$("#tipo_tela" option:selected).text();
    precio_total=$("#precio_total").text();
    saldo=$("#saldo").text();
    Firma_Cliente=$("#Firma_Cliente").text();
    Firma_Gerente=$("#Firma_Gerente").text();

    if (descripcion!="" && tipo_tela!="" && muestra!="" && detalle_muestra!="" )
    {
    

       var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idpedido[]" value="'+idpedido+'">'+descripcion+'</td><td><input type="text" name="tipo_tela[]" value="'+tipo_tela+'"></td><td><input type="text" name="precio_total[]" value="'+precio_total+'"></td><td><input type="number" name="saldo[]" value="'+saldo+'"></td><td><input type="number" name="Firma_Cliente[]" value="'+Firma_Cliente+'"></td><td><input type="number" name="Firma_Gerente[]" value="'+Firma_Gerente+'"></td></tr>';
       cont++;
       $('#detalles').append(fila);

    }
    else
    {
      alert("Error al ingresar el detalle del ingreso, revise los datos del articulo")
    }
  
  }
  function limpiar(){
    $("#pcantidad").val("");
    $("#pprecio_compra").val("");
    $("#pprecio_venta").val("");
  }

  function evaluar()
  {
    if (total>0)
    {
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide(); 
    }
   }

   function eliminar(index){
    total=total-subtotal[index]; 
    $("#total").html("S/. " + total);   
    $("#fila" + index).remove();
    evaluar();

  }
         </script>
         @endpush
         @endsection