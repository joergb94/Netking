
<iframe class="theme{{$data['themes_id']}}-shape {!! $card_style['divs_shape']  == 1?'div-rounded':''!!} {{$template == 0?'':$template}} {{$theme_shape}}"
        src="https://open.spotify.com/embed/playlist/{{$ci['card_detail']['name']}}?utm_source=generator" 
        width="100%" 
        height="{{$template == 0?315:$template}}"
        frameBorder="0" 
        allowfullscreen="" 
        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture">
</iframe>
