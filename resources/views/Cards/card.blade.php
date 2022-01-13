<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Card</title>
</head>
<body style ="background-image: url('img_girl.jpg')";>
<div class="col-sm-12">
    <br>
    <div class="col-sm-12">
        <div class="row justify-content-between">
            <div class="{!!($card_style['head_orientation'] == 0)?'col-sm-4':'col-sm-12'!!} text-center" id="contend-image">
                <img src="{{(isset($data['img_name']))? $data['img_path'].$data['img_name']:'https://www.w3schools.com/bootstrap4/cinqueterre.jpg'}}" class="{{$card_style['shape_image']?'rounded-circle':'rounded'}}" alt="Cinque Terre" width="100px" height="100px" id="imageProfile"> 
            </div>
            <div class="{!!($card_style['head_orientation'] == 0)?'col-sm-8':'col-sm-12'!!} text-center" id="contend-title">
                <br>
                <div class="col-sm-12" id='content-title'>
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
        <div class="col-sm-12 text-center" id="social">
            @if (isset($data['card_network']))
                @foreach ($data['card_network'] as $item)
                 <a class="btn btn-social-icon {{$item['social_network']['btn_network']}}" href="{{$item['url']}}">
                    <i class="{{$item['social_network']['icon']}}"></i>
                  </a>
                @endforeach
            @endif
        </div>
    </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>