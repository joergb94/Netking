@extends('layouts.welcome')
@section('content')
<div class="col-12 bg-white">
    <a class="" href="/"><h1 class="text-color-keypl"><i class="fa fa-angle-left"></i></h1></a>
    <br>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <img class="img-fluid" src="{{asset('img/register.png')}}" alt="">
                        </div>
                        <div class="col-12 col-sm-6">
                        <h1>Bienvenidx a keypl</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group form-floating-label">

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input-border-bottom" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <label for="email" class="placeholder">{{ __('CORREO') }}</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            
                            </div>

                            <div class="form-group form-floating-label">
                               
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-border-bottom" name="password" required autocomplete="new-password">
                                    <label for="password" class="placeholder">{{ __('CONTRASEÑA') }}</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            
                            </div>

                            <div class="form-group form-floating-label">
                                    <input id="password-confirm" type="password" class="form-control input-border-bottom" name="password_confirmation" required autocomplete="new-password">
                                    <label for="password-confirm" class="placeholder">{{ __('CONFIRMAR CONTRASEÑA') }}</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox col-8 text-flow">
                                        <input class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    
                                        <label class="custom-control-label text-flow" for="remember">
                                            <h6 class="text-dark">HE LEIDO Y ACEPTO LOS TERMINOS Y</h6>  
                                            <h6 class="text-dark">CONDICIONES</h6>
                                           
                                        </label>
                                    </div>
                                    <a href="{{ route('facebook.login') }}" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i>
                                    Login with Facebook
                                    </a>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-12 col-sm-6 col-md-6 offset-md-4 mx-auto d-block">
                                    <button type="submit" class="btn bg-keypl btn-block btn-rounded-keypls-start">
                                        {{ __('CREAR CUENTA') }}
                                    </button>
                                </div>
                                
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-12 col-sm-6 col-md-6 offset-md-4 mx-auto d-block text-center">
                                       YA TIENES CUENTA? <a class="text-color-keypl" href="/login"> INICIA SESION</a>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
