@extends('layouts.admin')
@section('contenido')
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar datos de la Tela: {{ $telas->nombre_tela}}</h3>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                {!!Form::model($telas,['method'=>'PATCH','route'=>['tela.update',$telas->id]])!!}
                    {{Form::token()}}
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre_tela" class="form-control" value="{{$telas->nombre_tela}}" placeholder="Nombre...">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" name="color_tela" class="form-control" value="{{$telas->color_tela}}" placeholder="Color ...">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                {!!Form::close() !!}
            </div>
        </div>
@endsection