<style>
    ::-webkit-scrollbar 
    {
        width: 5px;
    }

    /* Handle */
   
    body, html  
    {
            @if($card_style['background_color'] == 1)
                /* The color used */
                background-color: {!!$data["background_image_color"]!!};
             
            @else
                /* The image used */
                background-image: url('{{$actual_bg}}');
            @endif
            /* Full height */
            height: 100vh;
            width: 100%; 
            overflow-y: scroll;
            
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            color: white;
            font-weight: bold;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            padding: 20px;
            text-align: center;
            }
    }
        .keypl-btn-social
        {
            color: {!!$data['color']!!};
        }
            
        .keypl-btn-social:hover 
        {
            background: {!!$data['color']!!};
            color: white;
        }

        .keypl-text-social
        {
            color: {!!$data['color']!!};
        }
            
        .keypl-text-social:hover 
        {
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