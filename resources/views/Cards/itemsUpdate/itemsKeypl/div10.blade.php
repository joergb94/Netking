<div class="col-12 text-center mx-auto d-block theme{{$data['themes_id']}}-padding {{$theme_shape}}">
        <a class="btn {{$card_style['button_style'] == 0? 'keypl-btn ':'keypl-btn-full'}} btn-block {{$btn_shape}}" target="_blank" href="{{$ci['card_detail']['description']}}" >
            <div class="col-12">
                <h3 class="d-none d-md-block d-lg-block d-xl-block" style="font-family:{{$text_font->name}};">{!!$ci['card_detail']['name']!!} <i class="fa fa-external-link-alt"></i></h3>
                <i class="fa fa-external-link-alt d-block d-sm-block d-md-none d-lg-none d-xl-none"></i>
            </div>
        </a>
    </div>
   