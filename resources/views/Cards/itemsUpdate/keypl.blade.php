

    @if($card_style['background_color'])
    <div class="mobile-screen scroll" id="mobil-vition" style=" background-color:{{$data['background_image_color']}};">
    @else
    <div class="mobile-screen scroll" id="mobil-vition" style="background-image: url({{$actual_bg}}) ">
    @endif
        <div class="col-sm-12 mx-auto d-block ">
            @include('Cards.itemsUpdate.themes.theme'.$data['themes_id'])
        </div>
    </div>
