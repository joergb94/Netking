
@extends('layouts.welcome')
@section('content')
<div class="col-12">
    <div class="row justify-content-center" >
        <div class="col-12">
            <div class="">
                <div class="card-body ">
                    <div class="row ">
                        <div class="col-sm-6">
                                <img class="img-fluid image-welcome mx-auto d-block" src="{{asset('img/welcome1.png')}}" >
                        </div>
                        <div class="col-sm-6">
                        @guest
                                <div class="form-group row mb-0 padding-welcome-keypls">
                                    <div class="col-12 col-sm-6 col-md-6 offset-md-4 mx-auto d-block">
                                        <a href="{{ route('register') }}">
                                            <button type="button" class="btn bg-keypl btn-block btn-rounded-keypls-start">
                                                {{ __('CREAR UNA CUENTA') }}
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-12 col-sm-6 col-md-6 offset-md-4 mx-auto d-block">
                                       <h6>¿YA ERES USUARIO?</h6>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-12 col-sm-6 col-md-6 offset-md-4 mx-auto d-block">
                                         <a href="{{ route('login') }}">
                                            <button type="button" class="btn bg-keypl-nav btn-block btn-rounded-keypls-start">
                                                {{ __('INICIA SESION') }}
                                            </button>
                                        </a>
                                    </div>
                                </div>
				        @else
						        <div class="form-group row mb-0 padding-welcome-keypls">
                                    <div class="col-12 col-sm-6 col-md-6 offset-md-4 mx-auto d-block">
                                        <a href="{{ app('router')->has('home') ? route('home') : url('/') }}">
                                            <button type="button" class="btn bg-keypl btn-block btn-rounded-keypls-start">
                                                {{ __('IR AL INICIO') }}
                                            </button>
                                        </a>
                                    </div>
                                </div>
					    @endguest
                               
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection