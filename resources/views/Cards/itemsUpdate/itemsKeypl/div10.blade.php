<div class="col-12 text-center mx-auto d-block theme{{$data['themes_id']}}-padding {{$theme_shape}}">
        <a class="btn btn-primary btn-block {{$btn_shape}}" target="_blank" href="{{$ci['card_detail']['description']}}" >
            <div class="col-12">
                <h3 class="d-lg-block d-lg-none d-xl-block" style="font-family:{{$text_font->name}};"><i class="fa fa-external-link-alt"></i></h3>
                <h3 class="d-none d-sm-block"  style="font-family:{{$text_font->name}};">{!!$ci['card_detail']['name']!!} <i class="fa fa-external-link-alt"></i></h3>
            </div>
        </a>
    </div>
   