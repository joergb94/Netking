<div class="row justify-content-between {{$theme_shape}}">
        @if($data['themes_id'] == 3)
                <div onmousedown="return false" class="col-12 text-center mx-auto d-block theme{{$data['themes_id']}}-padding" id="social">
                    @if (isset($data['card_network']))
                        @if($card_style['button_style'] == 0)
                            @foreach ($data['card_network'] as $item)
                                <button class="btn btn-link-keyp-social {{$btn_shape}} btn-social-icon keypl-btn-social theme3-padding-btn" value="{{$item['id']}}" >
                                    <span class="{{$item['social_network']['icon']}}  keypl-text-social"></span>
                                    <input type="hidden" id="cutom-social-token{{$item['id']}}" value="{{$ci['card_detail']['id']}}">
                                </button>
                            @endforeach
                        @else
                            @foreach ($data['card_network'] as $item)
                                <button class="btn btn-link-keyp-social {{$btn_shape}} btn-social-icon {{$item['social_network']['btn_network']}} theme3-padding-btn" value="{{$item['id']}}" >
                                    <span class="{{$item['social_network']['icon']}}"></span>
                                    <input type="hidden" id="cutom-social-token{{$item['id']}}" value="{{$ci['card_detail']['id']}}">
                                </button>
                            @endforeach
                        @endif
                    
                    @endif
                </div>
        @else
                <div onmousedown="return false" class="col-12 text-center mx-auto d-block theme{{$data['themes_id']}}-padding" id="social">
                    @if ($ns_quantity == 0)
                        @for ($i = 0; $i < $ns_default_free; $i++)
                            <button class="btn btn-link-keyp-socialtheme-{{$data['themes_id']}}-btn-rounded btn-social-icon btn-social-icon-padding   theme{{$data['themes_id']}}-button-col-social  bg-keypl" >
                                <i class="fa fa-plus"></i>
                            </button>
                        @endfor
                    @else
                        @if($card_style['button_style'] == 0)
                            @foreach ($data['card_network'] as $item)
                                <button class="btn btn-link-keyp-socialtheme-{{$data['themes_id']}}-btn-rounded btn-social-icon  theme{{$data['themes_id']}}-button-col-social keypl-btn-social"  value="{{$item['id']}}">
                                    <span class="{{$item['social_network']['icon']}} keypl-text-social theme{{$data['themes_id']}}-icon-social"></span>
                                    <input type="hidden" id="cutom-social-token{{$item['id']}}" value="{{$ci['card_detail']['id']}}">
                                
                                </button>
                            @endforeach
                        @else
                            @foreach ($data['card_network'] as $item)
                                <button class="btn btn-link-keyp-socialtheme-{{$data['themes_id']}}-btn-rounded btn-social-icon btn-social-icon-padding   theme{{$data['themes_id']}}-button-col-social  {{$item['social_network']['btn_network']}}" value="{{$item['id']}}">
                                    <span class="{{$item['social_network']['icon']}} theme{{$data['themes_id']}}-icon-social"></span>
                                    <input type="hidden" id="cutom-social-token{{$item['id']}}" value="{{$ci['card_detail']['id']}}">
                                </button>
                            @endforeach
                        @endif
                    @endif
                </div>
                     
        
        @endif
</div>