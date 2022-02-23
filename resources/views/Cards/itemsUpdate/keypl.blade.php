

    @if($card_style['background_color'])
    <div class="mobile-screen scroll" id="mobil-vition" style=" background-color:{{$data['background_image_color']}};">
    @else
    <div class="mobile-screen scroll" id="mobil-vition" style="background-image: url('{{$actual_bg}}') ">
    @endif
    <style>
           .keypl-btn-social
        {
            color: {!!$data['color']!!};
        }
            
        .keypl-btn-social:hover 
        {
            background: {!!$data['color']!!};
            color: white;
        }

          .keypl-btn 
        {
            border-color: {!!$data['color']!!};
            color: {!!$data['color']!!};
        }
            
        .keypl-btn:hover 
        {
            background: {!!$data['color']!!};
            color: white;
        }

        .keypl-btn-full 
        {
            background: {!!$data['color']!!};
            color: white;
        }
    </style>
        <div class="col-sm-12 mx-auto d-block ">
            @include('Cards.itemsUpdate.themes.theme'.$data['themes_id'])
        </div>
    </div>
