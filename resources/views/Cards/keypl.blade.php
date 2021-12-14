<div class="col-sm-12">
    <br>
    <div class="col-sm-12">
        <div class="row justify-content-between">
            <div class="col-sm-12 text-center">
                <img src="https://www.w3schools.com/bootstrap4/cinqueterre.jpg" class="rounded-circle" alt="Cinque Terre" width="100px" height="100px" id="bgphone"> 
            </div>
            <div class="col-sm-12 text-center">
                <br>
                <div class="col-sm-12" id='content-title'>
                    @if($data['large_text'])
                        <h1 class="text-color" id="titlephone">@if(isset($data['title'])){{$data['title']}}@endif</h1>
                    @else
                        <h2 class="text-color" id="titlephone">@if(isset($data['title'])){{$data['title']}}@endif</h2>
                    @endif 
                </div>
                @if($data['large_text'])
                    <p class="text-color" id="namephone">{{$user['name']}}</p>
                @else
                    <h2 class="text-color" id="namephone">{{$user['name']}}</h2>
                @endif
                
                <h6 class="text-color" id="subephone">@if(isset($data['subtitle'])){{$data['subtitle']}}@endif</h6>
            </div>
            <p class="text-color" id="longtext">@if(isset($data['large_text'])){{$data['large_text']}}@endif</p>
        </div>
    </div>
    <div class="col-sm-12">
    <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/aheVhtnpAF0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <br>
    <div class="row justify-content-between">
        <div class="col-sm-12 text-center" id="social">
           
            @if (isset($data['card_network']))
                @foreach ($data['card_network'] as $item)
                      <a class="btn btn-block btn-social btn-twitter">
                        <span class="fa fa-twitter"></span>
                      </a>
                @endforeach
            @endif
        </div>
    </div>
</div>


