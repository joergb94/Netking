
<div class="col-12">
    <div class="row justify-content-center" >
        <div class="col-12">
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12 col-sm-4 mx-auto d-block">
                                <img class="img-fluid image-start" src="{{asset('img/name.png')}}" alt="">
                            </div>
                        </div>
                       <div class="col-12">
                        <div class="col-12 col-sm-4 mx-auto d-block">
                                <h1>Bienvenidx a keypl</h1>
                                <p>Comencemos por el inicio, nos gustari saber ¿Cual tu nombre?</p>

                                            <div class="form-group form-floating-label">
                                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror input-border-bottom" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                <label for="username" class="placeholder">MI NOMBRE ES</label>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                            </div>
                       </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
