
@if($card_style['background_color'])
<div class="mobile-screen" id="mobil-vition" style=" background-color:{{$data['background_image_color']}};">
@else
    <div class="mobile-screen" id="mobil-vition" style="background-image: url({{$actual_bg}})">
@endif
    <div class="col-sm-12 mx-auto d-block ">
        @foreach($cardItems as $ci)
            <br>
            <div class="col-sm-12" id="div-{{$ci['card_detail']->id}}">
                @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id)
            </div>
            <br>
        @endforeach
    </div>
</div>