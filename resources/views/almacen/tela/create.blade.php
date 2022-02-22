@extends('layouts.admin')
@section('contenido')
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nueva Tela</h3>
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

                {!!Form::open(array('url'=>'pedidos/tela','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                        <div class="form-group">
                            <label for="nombre_tela">Nombre</label>
                            <input type="text" name="nombre_tela" class="form-control" placeholder="Nombre...">
                        </div>
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input type="text" name="color_tela" class="form-control" placeholder="Color de tela ...">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                {!!Form::close() !!}
            </div>
        </div>
@endsection