
    <div class="col-12 text-center mx-auto d-block theme{{$data['themes_id']}}-padding {{$theme_shape}}">
        <a href="{{$ci['card_detail']['description']}}" class="btn btn-gray {{$btn_shape}} text-white btn-block" download>
            <div class="col-12 mx-auto d-block">
                <h3 class="d-md-none mx-auto d-block" style="font-family:{{$text_font->name}};"><i class="fa fa-file-download"></i></h3>
                <h3 class="d-none d-md-block"  style="font-family:{{$text_font->name}};">{!!$ci['card_detail']['name']!!} <i class="fa fa-file-download"></i></h3>
            </div>
        </a>
    </div>

