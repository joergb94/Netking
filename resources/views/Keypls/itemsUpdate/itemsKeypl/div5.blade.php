<style>
            @media screen and (min-width: 640px){
                #facebookDiv{{$ci['card_detail']['id']}} {
                    border:none;
                    overflow:hidden;
                    height:auto;
                }
            }
            @media screen and (min-width: 1920px){
                #facebookDiv{{$ci['card_detail']['id']}} {
                  
                    border:none;
                    overflow:hidden;
                    height:{{$template > 350?350:$template}}px;
                }
            }
            @media screen and (max-width: 450px){
                #facebookDiv{{$ci['card_detail']['id']}} {
                
                    border:none;
                    overflow:hidden;
                    height:auto;
                }
            }
    </style>
 
        <div id ="facebookDiv{{$ci['card_detail']['id']}}" class="col-12 theme{{$data['themes_id']}}-padding {{$theme_shape}} {{$theme_shape}}">
            <iframe 
                class="{!! $card_style['divs_shape']  == 1?'div-rounded':''!!}"
                width="100%"
                height="100%"
                src="{{$ci['card_detail']['name']}}" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>
  
    