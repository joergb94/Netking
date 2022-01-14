<div class="col-sm-12 mx-auto d-block ">
            <br>
            <div class="col-sm-12">
                <div class="row justify-content-between">
                    <div class="{{($card_style['head_orientation'] == 1)?'col-4':'col-12'}} text-center" id="contend-image">
                        <img src="{{(isset($data['img_name']))? $data['img_path'].$data['img_name']:'https://www.w3schools.com/bootstrap4/cinqueterre.jpg'}}" class="{{$card_style['shape_image'] == 0?'rounded-circle':'rounded'}}" alt="Cinque Terre" width="100px" height="100px" id="imageProfile"> 
                    </div>
                    <div class="{{($card_style['head_orientation'] == 1)?'col-8':'col-12'}} text-center" id="contend-title">
                        <br>
                        <div class="col-12" id='content-title'>
                            @if($data['large_text'])
                                <h1 class="text-color" id="titlephone" style="color:{!!$data['color']!!}">@if(isset($data['title'])){{$data['title']}}@endif</h1>
                            @else
                                <h2 class="text-color" id="titlephone" style="color:{!!$data['color']!!}">@if(isset($data['title'])){{$data['title']}}@endif</h2>
                            @endif 
                        </div>
                        @if($data['large_text'])
                            <p class="text-color" id="namephone" style="color:{!!$data['color']!!}">{{$user['name']}}</p>
                        @else
                            <h2 class="text-color" id="namephone" style="color:{!!$data['color']!!}">{{$user['name']}}</h2>
                        @endif
                        
                        <h6 class="text-color" id="subephone" style="color:{!!$data['color']!!}">@if(isset($data['subtitle'])){{$data['subtitle']}}@endif</h6>
                    </div>
                
                </div>
            </div>
            <br>
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
    </div