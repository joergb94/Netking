<style>
                  #facebookDiv{{$ci['card_detail']['id']}} {
                    border:none;
                    overflow:hidden;
                    height:auto;
                }
          
    </style>
 
        <div id ="facebookDiv{{$ci['card_detail']['id']}}" class="col-12 theme{{$data['themes_id']}}-padding {{$theme_shape}} {{$theme_shape}}">
            <iframe 
                onmousedown="return false"
                class="{!! $card_style['divs_shape']  == 1?'div-rounded':''!!}"
                width="100%"
                height="100%"
                src="{{$ci['card_detail']['name']}}" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>
  
    