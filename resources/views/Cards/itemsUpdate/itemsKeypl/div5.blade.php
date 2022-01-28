<style>
            #facebookFrame{{$ci['card_detail']['id']}} {
                width:100%;
                border:none;
                overflow:hidden;
                height:{{$ci['card_detail']['item_data'] > 525?525:$ci['card_detail']['item_data']}}px;
            }
            @media screen and (max-width: 450px){
                #facebookFrame{{$ci['card_detail']['id']}} {
                    width:100%;
                    border:none;
                    overflow:hidden;
                    height:{{$ci['card_detail']['item_data'] > 500?500:$ci['card_detail']['item_data']}}px;
                }
            }


    </style>
    <div class="col-12">
        <div class="col-12 bg-white text-center mx-auto d-block {!! $card_style['divs_shape']  == 1?'div-rounded':''!!}">
            <iframe 
                id ="facebookFrame{{$ci['card_detail']['id']}}"
                class="mx-auto d-block col-12"
                src="{{$ci['card_detail']['name']}}" 
                scrolling="no" 
                frameborder="0" 
                allowfullscreen="true" 
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
            </iframe>
        </div>
    </div>
    