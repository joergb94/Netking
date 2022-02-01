

    @if($card_style['background_color'])
    <div class="mobile-screen scroll" id="mobil-vition" style=" background-color:{{$data['background_image_color']}};">
    @else
    <div class="mobile-screen scroll" id="mobil-vition" style="background-image: url({{$actual_bg}}) ">
    @endif
        <div class="col-sm-12 mx-auto d-block ">
            <br>
            <div class="row justify-content-between">
                @foreach($cardItems as $ci)
                    <div class="col-sm-12" id="div-{{$ci['card_detail']->id}}">
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id)
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
