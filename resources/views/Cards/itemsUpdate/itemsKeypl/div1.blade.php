<div class="row justify-content-between">
                    <div class="{{($card_style['head_orientation'] == 1)?'col-4':'col-12'}} text-center" id="contend-image">
                        <img src="{{(isset($data['img_name']))? $data['img_path'].$data['img_name']:'https://www.w3schools.com/bootstrap4/cinqueterre.jpg'}}" class="{{$card_style['shape_image'] == 0?'rounded-circle':'rounded'}}" alt="Cinque Terre" width="100px" height="100px" id="imageProfile"> 
                    </div>
                    <div class="{{($card_style['head_orientation'] == 1)?'col-8':'col-12'}} text-center" id="contend-title">
                        <br>
                        <div class="col-12" id='content-title'>
                            @if($data['large_text'])
                                <h1 class="text-color" id="titlephone" style="color:{!!$data['color']!!}; font-family:{{$text_font->name}};">
                                @if(isset($ci['card_detail']['name'])){{$ci['card_detail']['name']}}@endif
                            </h1>
                            @else
                                <h2 class="text-color" id="titlephone" style="color:{!!$data['color']!!};font-family:{{$text_font->name}};">@if(isset($ci['card_detail']['name'])){{$ci['card_detail']['name']}}@endif</h2>
                            @endif 
                        </div>
                        @if($data['large_text'])
                            <p class="text-color" id="namephone" style="color:{!!$data['color']!!};font-family:{{$text_font->name}};">{{$user['name']}}</p>
                        @else
                            <h2 class="text-color" id="namephone" style="color:{!!$data['color']!!};font-family:{{$text_font->name}};">{{$user['name']}}</h2>
                        @endif
                        
                        <h6 class="text-color" id="subephone" style="color:{!!$data['color']!!};font-family:{{$text_font->name}};">@if(isset($ci['card_detail']['description'])){{$ci['card_detail']['description']}}@endif</h6>
                    </div>
                
</div>
