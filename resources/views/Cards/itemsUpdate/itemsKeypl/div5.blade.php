<div class="row justify-content-between">
    <div class="col-12 col-sm-10 text-center mx-auto d-block">
        <iframe 
            class="mx-auto d-block {!! $card_style['divs_shape']  == 1?'div-rounded':''!!}"
            src="{{$ci['card_detail']['name']}}" 
            height="{{$ci['card_detail']['item_data']}}" 
            style="border:none;overflow:hidden; width:100%;" 
            scrolling="no" 
            frameborder="0" 
            allowfullscreen="true" 
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
        </iframe>
    </div>
</div>