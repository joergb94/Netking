
    <iframe 
        onmousedown="return false"
        class="{{$theme_shape}} {!! $card_style['divs_shape']  == 1?'div-rounded':''!!}" 
        width="100%" 
        height="{{$template == 0?315:$template}}"
        src="https://www.youtube.com/embed/{{$ci['card_detail']['name']}}" 
        title="YouTube video player" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen
    >
    </iframe>
