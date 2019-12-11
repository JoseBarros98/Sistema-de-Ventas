@extends('layouts.admin')
@section('contenido')
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Contacto</h3>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

               
                        <form method="POST" action="{{ route('contacto.store') }}">
                           @csrf
                            <div class="form-control">
                                <input name='name' placeholder='Nombre' type='text' >
                            </div>
                            <div class="form-control">
                                <input  name='email' placeholder='E-mail' type='email'>
                            </div>  
                            <div class="form-control">
                                <input name='subject' placeholder='Asunto' type='text'> 
                            </div>
                            <div class="form-control">
                                <textarea name="content" placeholder="Mensaje..."></textarea>
                            </div>

                            <div class="form-group">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                        </form>





                        
                
            </div>
        </div>
@endsection