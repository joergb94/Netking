@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <div class="row justify-content-center" >
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="text-center">Sign In To Admin</h3></div>

                <div class="card-body">
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
                            <div class="col-md-6 offset-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                
                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn bg-keypl">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
