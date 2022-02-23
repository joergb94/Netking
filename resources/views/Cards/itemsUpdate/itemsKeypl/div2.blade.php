<div class="row justify-content-between {{$theme_shape}}">
        @if($data['themes_id'] == 3)
                <div class="col-12 text-center mx-auto d-block theme{{$data['themes_id']}}-padding" id="social">
                    @if (isset($data['card_network']))
                    @if($card_style['button_style'] == 0)
                        @foreach ($data['card_network'] as $item)
                            <a class="btn {{$btn_shape}} btn-social-icon keypl-btn-social theme3-padding-btn" target="_blank" href="{{$item['url']}}">
                                <span class="{{$item['social_network']['icon']}}"></span>
                            </a>
                        @endforeach
                    @else
                        @foreach ($data['card_network'] as $item)
                            <a class="btn {{$btn_shape}} btn-social-icon {{$item['social_network']['btn_network']}} theme3-padding-btn" target="_blank" href="{{$item['url']}}">
                                <span class="{{$item['social_network']['icon']}}"></span>
                            </a>
                        @endforeach
                    @endif
                    @endif
                </div>
        @else
                <div class="col-12 text-center mx-auto d-block theme{{$data['themes_id']}}-padding" id="social">
                    @if (isset($data['card_network']))
                    @if($card_style['button_style'] == 0)
                        @foreach ($data['card_network'] as $item)
                            <a class="btn {{$btn_shape}} btn-social-icon keypl-btn-social" target="_blank" href="{{$item['url']}}">
                                <span class="{{$item['social_network']['icon']}}"></span>
                            </a>
                        @endforeach
                    @else
                        @foreach ($data['card_network'] as $item)
                            <a class="btn {{$btn_shape}} btn-social-icon {{$item['social_network']['btn_network']}}" target="_blank" href="{{$item['url']}}">
                                <span class="{{$item['social_network']['icon']}}"></span>
                            </a>
                        @endforeach
                    @endif
                    @endif
                </div>
        @endif
</div>