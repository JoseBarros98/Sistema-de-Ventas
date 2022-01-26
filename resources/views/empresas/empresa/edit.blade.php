@extends('layouts.admin')
@section('contenido')
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar Articulo: {{ $enterprises->nombre}}</h3>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            </div>
        </div>
                <form action="enterprises.update" method="PUT">
                    @csrf
                    <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                     <label for="nombre">Nombre</label>
                     <input type="text" name="nombre" required value="{{$enterprises->nombre}}" class="form-control" >
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label>Pais</label>
                    <select name="pais" class="form-control">
                        @foreach($nacionalidads as $nac)
                            @if($nac->id==$enterprises->pais)
                            <option value="{{$nac->id}}"selected>{{$nac->pais}}</option>
                            @else
                            <option value="{{$nac->id}}">{{$nac->pais}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                     <label for="telefono">Telefono</label>
                     <input type="text" name="telefono" required value="{{$enterprises->telefono}}" class="form-control" >
                </div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                     <label for="nit">NIT de la empresa</label>
                     <input type="text" name="nint" required value="{{$enterprises->nit}}" class="form-control" >
                </div>
            </div>
            

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>

        </div>       
    </form>
    
            
@endsection