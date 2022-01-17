<div class="row justify-content-between">
                <div class="col-12 text-center mx-auto d-block" id="social">
                    @if (isset($data['card_network']))
                        @foreach ($data['card_network'] as $item)
                        <a class="btn btn-social-icon {{$item['social_network']['btn_network']}}" href="{{$item['url']}}">
                            <span class="{{$item['social_network']['icon']}}"></span>
                        </a>
                        @endforeach
                    @endif
                </div>
</div>