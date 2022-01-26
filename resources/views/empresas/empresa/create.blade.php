@extends('layouts.admin')
@section('contenido')
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nueva Empresa</h3>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
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

                {!!Form::open(array('url'=>'empresas/empresa','method'=>'POST','autocomplete'=>'off','file'=>'true', 'enctype'=>'multipart/form-data'))!!}
                    {{Form::token()}}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                     <label for="nombre">Nombre</label>
                     <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label>Nacionalidad</label>
                    <select name="pais" class="form-control">
                        @foreach($nacionalidads as $nac)
                            <option value="{{$nac->id}}">{{$nac->pais}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                     <label for="nit">NIT</label>
                     <input type="text" name="nit" required value="{{old('nit')}}" class="form-control" placeholder="Nit de la empresa...">
                </div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                     <label for="telefono">telefono</label>
                     <input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Telefono/Celular de la empresa">
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>

        </div>
                              
                {!!Form::close() !!}
@endsection