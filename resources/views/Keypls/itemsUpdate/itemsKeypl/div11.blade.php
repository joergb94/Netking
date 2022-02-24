
    <div class="col-12 theme{{$data['themes_id']}}-padding text-center mx-auto d-block">
        <button class="btn btn-link-keypl {{$card_style['button_style'] == 0? 'keypl-btn':'keypl-btn-full'}} btn-block {{$btn_shape}}" value="{{$ci['card_detail']['id']}}"  >
            <h3 class ="{{$card_style['button_style'] == 0? 'keypl-text-social ':''}}" style="font-family:{{$text_font->name}};">{!!$ci['card_detail']['name']!!}</h3>
        </button>
    </div>
   

