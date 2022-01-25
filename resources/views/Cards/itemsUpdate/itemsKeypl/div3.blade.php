<div class="row justify-content-between">
    <iframe 
        class="{!! $card_style['divs_shape']  == 1?'div-rounded':''!!}" 
        width="100%" 
        height="315" 
        src="https://www.youtube.com/embed/{{$ci['card_detail']['name']}}" 
        title="YouTube video player" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen
    >
    </iframe>
</div>