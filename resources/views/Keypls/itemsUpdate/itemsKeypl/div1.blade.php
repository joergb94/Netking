<div class="col-12 theme{{$data['themes_id']}}-padding">
    
                    @if($data['themes_id'] == 3)
                    <div class="row no-margin">
                        <div class="col-sm-12"  id="contend-image">
                            <img src="{{(isset($ci['card_detail']['item_data']))? $ci['card_detail']['item_data']:asset('img/profile.jpg')}}" class="{{$theme_shape}} theme3-float" alt="Cinque Terre" id="imageProfile"> 
                        </div>
                        <div class="col-sm-12" id="contend-title">
                      
                                <div class="col-6 text-center" style="left:40%;">
                                    @if($data['large_text'])
                                        <h1 class="text-color" id="titlephone" style="color:{!!$data['color']!!}; font-family:{{$text_font->name}};">
                                        @if(isset($ci['card_detail']['name'])){{$ci['card_detail']['name']}}@endif
                                    </h1>
                                    @else
                                        <h2 class="text-color" id="titlephone" style="color:{!!$data['color']!!};font-family:{{$text_font->name}};">@if(isset($ci['card_detail']['name'])){{$ci['card_detail']['name']}}@endif</h2>
                                    @endif                          
                                    <h6 class="text-color" id="subephone" style="color:{!!$data['color']!!};font-family:{{$text_font->name}};">@if(isset($ci['card_detail']['description'])){{$ci['card_detail']['description']}}@endif</h6>
                                </div>         
                        </div>
                    </div>
                    @else
                    <div class="row justify-content-between ">
                        <div class="{{($card_style['head_orientation'] == 1)?'col-4':'col-12'}} text-center" id="contend-image">
                            <img src="{{(isset($ci['card_detail']['item_data']))? $ci['card_detail']['item_data']:asset('img/profile.jpg')}}" class="{{$card_style['shape_image'] == 0?'rounded-circle':'rounded'}}" alt="Cinque Terre" width="100px" height="100px" id="imageProfile"> 
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
                            <h6 class="text-color" id="subephone" style="color:{!!$data['color']!!};font-family:{{$text_font->name}};">@if(isset($ci['card_detail']['description'])){{$ci['card_detail']['description']}}@endif</h6>
                        </div>
                    </div>
                    @endif
    
</div>

