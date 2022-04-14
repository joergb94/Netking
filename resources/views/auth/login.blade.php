@extends('layouts.welcome')

@section('content')
<div class="col-12">
    <a href="/"><h1 class="text-color-keypl"><i class="fa fa-angle-left"></i></h1></a>
    <br>
    <div class="row justify-content-center" >
        <div class="col-12">
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="img-fluid" src="{{asset('img/login.png')}}" alt="">
                        </div>
                        <div class="col-sm-6">
                        <h1>Bienvenidx a keypl</h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                    <div class="form-group form-floating-label">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input-border-bottom" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <label for="username" class="placeholder">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-floating-label">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-border-bottom" name="password" required autocomplete="current-password">
                                        <label for="password" class="placeholder">Password</label>
                                        <div class="show-password">
                                            <i class="flaticon-interface"></i>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                <div class="form-group row">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link text-dark text-welcome" href="{{ route('password.request') }}">
                                                {{ __('OLVIDE LA CONTRASEÑA') }}
                                            </a>
                                        @endif
                                </div>
                                <div class="form-group row mb-0">
                                <div class="col-12 col-sm-6 col-md-6 offset-md-4 mx-auto d-block">
                                    <button type="submit" class="btn bg-keypl btn-block btn-rounded-keypls-start">
                                        {{ __('INICIAR SESION') }}
                                    </button>
                                </div>
                                
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-12 col-sm-6 col-md-6 offset-md-4 mx-auto d-block text-center">
                                       NO ERES USUARIO? <a class="text-color-keypl" href="/register"> REGISTRATE</a>
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
