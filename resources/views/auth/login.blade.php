@extends('layouts.app')
<title>JhonnySport</title>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
@section('content')
<style>
    *,
    *:before,
    *:after {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    }

    body,
    html,
    .login_form {
    height: 100%;
    }

    body {
    background: #104CAD;
    }

    .login_form {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-flex: center;
    -moz-box-flex: center;
    -webkit-flex: center;
    -ms-flex: center;
    flex: center;
    -webkit-justify-content: center;
    -moz-justify-content: center;
    justify-content: center;
    -webkit-box-pack: center;
    -moz-box-pack: center;
    -ms-flex-pack: center;
    -webkit-align-items: center;
    align-items: center;
    }

    .login-wrapper {
    max-width: 500px;
    width: 100%;
    }

    .logo {
    text-align: center;
    }
    .logo img {
    max-width: 200px;
    width: 100%;
    margin: 1em auto 2em;
    }

    form {
    background: #000;
    padding: 2em 1em;
    font-family: helvetica, sans-serif;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    }
    form label {
    color: #fff;
    margin: 0 3% 0.25em;
    display: block;
    font-family: helvetica, sans-serif;
    }
    form input {
    width: 94%;
    padding: 0.5em 0.25em;
    margin: 0 3% 1em;
    font-size: 1.2em;
    border: 2px solid #000;
    outline: none;
    -webkit-transition: all 0.25s;
    -moz-transition: all 0.25s;
    -ms-transition: all 0.25s;
    -o-transition: all 0.25s;
    transition: all 0.25s;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    }
    form input.password {
    padding-right: 4rem;
    }
    form input:focus {
    border: 2px solid #246FE9;
    }
    form button {
    width: 94%;
    margin: 2em 3% 0;
    border: none;
    background: #246FE9;
    padding: 1em 0;
    font-size: 1.25em;
    clear: both;
    color: #000;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    outline: none;
    -webkit-transition: all 0.25s;
    -moz-transition: all 0.25s;
    -ms-transition: all 0.25s;
    -o-transition: all 0.25s;
    transition: all 0.25s;
    cursor: pointer;
    }
    form button:focus,
    form button:hover {
    background: #262626;
    }

    .hide-show {
    width: 94%;
    margin: -3.62em 3% 0 1.5%;
    position: relative;
    z-index: 5;
    display: none;
    }
    .hide-show span {
    background: #246FE9;
    font-size: 1em;
    padding: 0.5em;
    float: right;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    cursor: pointer;
    }
</style>
<script>
        $(function(){
    $('.hide-show').show();
    $('.hide-show span').addClass('show')
    
    $('.hide-show span').click(function(){
        if( $(this).hasClass('show') ) {
        $(this).text('Hide');
        $('input[name="login[password]"]').attr('type','text');
        $(this).removeClass('show');
        } else {
        $(this).text('Show');
        $('input[name="login[password]"]').attr('type','password');
        $(this).addClass('show');
        }
    });
        
        $('form button[type="submit"]').on('click', function(){
            $('.hide-show span').text('Show').addClass('show');
            $('.hide-show').parent().find('input[name="login[password]"]').attr('type','password');
        }); 
    });   
</script>

    
    <div class="login_form">
        <section class="login-wrapper">
                <div class="logo">
		            <img src="{{ asset('/img/izi.png') }}" alt=""/></a>
                </div>
                
                    <form id="login" method="POST" action="{{ route('login') }}">
                        @csrf

                        
                            <label for="username">{{ __('Usuario:') }}</label>

                            
                                <input id="username"  autocapitalize="off" autocorrect="off" type="text"  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        

                            <label for="password" >{{ __('Contraseña:') }}</label>

                                <input class="password" id="password"  type="password"  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                                <button type="submit" >
                                    {{ __('Acceder') }}
                                </button>
                            

                        

                                

                          
                    
                    </form>
        </section>
    </div>

 
@endsection
