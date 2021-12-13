<div class="col-sm-12">
    <br>
    <div class="col-sm-12">
        <div class="row justify-content-between">
            <div class="col-sm-12 text-center">
                <img src="https://www.w3schools.com/bootstrap4/cinqueterre.jpg" class="rounded-circle" alt="Cinque Terre" width="100px" height="100px" id="bgphone"> 
            </div>
            <div class="col-sm-12 text-center">
                <h1 class="text-danger" id="namephone">ray </h1>
                <p class="text-danger" id="titlephone">@if(isset($data['title'])){{$data['title']}}@endif</p>
                <h6 class="text-danger" id="subephone">@if(isset($data['subtitle'])){{$data['subtitle']}}@endif</h6>
            </div>
            <p class="text-danger" id="longtext">@if(isset($data['large_text'])){{$data['large_text']}}@endif</p>
        </div>
    </div>
    <br>
    <div class="row justify-content-between">
        <div class="col-sm-12 text-center" id="social">
            @if (isset($data['card_network']))
                @foreach ($data['card_network'] as $item)
                    {!!$item['url']!!}
                @endforeach
            @endif
        </div>
    </div>
</div>


