
<div class="col-12 theme{{$data['themes_id']}}-padding">
    
                    @if($data['themes_id'] == 3)
                    <div class="theme3-col-12 theme3-float">
                        <div class="row no-margin">
                            <div class="col-sm-12"  id="contend-image">
                                <div class="col-12 text-center">
                                    <img src="{{(isset($ci['card_detail']['item_data']))? $ci['card_detail']['item_data']:asset('img/profile.jpg')}}" class="{{$theme_shape}} mx-auto d-block" alt="Cinque Terre" id="imageProfile"> 
                                </div>
                               
                            </div>
                            <div class="col-sm-12" id="contend-title">
                                <div class="col-12">
                                    <br>
                                    <div class="label-theme3 mx-auto d-block">
                                        @if($data['large_text'])
                                            <h1 class="text-color mx-auto d-block" id="titlephone" style="color:{!!$data['color']!!}; font-family:{{$text_font->name}};">
                                            @if(isset($ci['card_detail']['name'])){{$ci['card_detail']['name']}}@endif
                                        </h1>
                                        @else
                                            <h2 class="text-color mx-auto d-block" id="titlephone" style="color:{!!$data['color']!!};font-family:{{$text_font->name}};">@if(isset($ci['card_detail']['name'])){{$ci['card_detail']['name']}}@endif</h2>
                                        @endif                          
                                        <h6 class="text-color mx-auto d-block" id="subephone" style="color:{!!$data['color']!!};font-family:{{$text_font->name}};">@if(isset($ci['card_detail']['description'])){{$ci['card_detail']['description']}}@endif</h6>
                                    </div>   
                                </div>      
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row justify-content-between ">
                        <div class="{{($card_style['head_orientation'] == 1)?'col-6':'col-12'}} text-center no-margin" id="contend-image">
                              @include('Keypls.itemsUpdate.themes.button')
                             <img 
                                src="{{(isset($ci['card_detail']['item_data']))? $ci['card_detail']['item_data']:asset('img/profile.jpg')}}" 
                                class="{{$card_style['shape_image'] == 0?'rounded-circle':'rounded'}}" 
                                alt="Cinque Terre" 
                                width="150px" 
                                height="150px" 
                                style="padding-right: 10px;"
                                id="imageProfile"> 
                        </div>
                        <div class="{{($card_style['head_orientation'] == 1)?'col-6':'col-12'}} text-center" id="contend-title">
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
                            <p class="text-color theme-{{$data['themes_id']}}-text-size" id="subephone" style="color:{!!$data['color']!!};font-family:{{$text_font->name}};">@if(isset($ci['card_detail']['description'])){{$ci['card_detail']['description']}}@endif</p>
                        </div>
                    </div>
                    @endif
    
</div>

