<div class="col-sm-12" id='data-card'>
    <div class="col-sm-12">
        <div class="row">
            @foreach($ns as $social)
            <div class="col-sm-6">
                <label for="{{$social['name']}}">{{$social['name']}}</label>
                
                <div class="input-group mb-3 group-social">
                    <div class="input-group-prepend">
                        <a class="btn btn-social-icon {{$social['btn_network']}}" href="#">
                            <span class="{{$social['icon']}}"></span>
                        </a>
                    </div>
                    <input type="text" class="form-control form-control-sm n-social" onchange="Cards.prev()" id="{{$social['name']}}" >
                    <input type="hidden"  class="n-button" value="{{$social['btn_network']}}">
                    <input type="hidden"  class="n-icon" value="{{$social['icon']}}">
                    <input type="hidden"  class="ns-id" value="{{$social['id']}}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>