
<div class="col-12">
    <div class="row justify-content-center" >
        <div class="col-12">
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12 col-sm-4 mx-auto d-block">
                                <img class="img-fluid" src="{{asset('img/image.png')}}" alt="">
                            </div> 
                        </div>
                        <div class="col-12">
                            <div class="col-12 col-sm-4 mx-auto d-block">
                                    <h1>¡Queremos conocerte!</h1>
                                    <p>Agregar la foto que mas te guste para tu perfil</p>

                                    <div class="form-group form-floating-label" >
                                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror input-border-bottom" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        <label for="username" class="placeholder">ME DEDICO A</label>
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
