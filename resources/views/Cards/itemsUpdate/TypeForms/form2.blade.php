<div class="card">
  <div class="card-header ">Links</div>
  <div class="card-body">
    <form id="contact-form">
      <div class="col-sm-12">
        <div class="row">
            @foreach($ns as $social)
            <div class="col-sm-6">
                <label for="{{$social['nsData']['name']}}">{{$social['nsData']['name']}}</label>
                
                <div class="input-group mb-3 group-social">
                    <div class="input-group-prepend">
                        <a class="btn btn-social-icon {{$social['nsData']['btn_network']}}" href="#">
                            <span class="{{$social['nsData']['icon']}}"></span>
                        </a>
                    </div>
                    <input type="text" class="form-control form-control-sm n-social" onchange="Cards.save_asinc({{$social['card_id']}})" value ="{{isset($social['nsUser'])?$social['nsUser']['url']:''}}"  id="{{$social['nsData']['name']}}" >
                    <input type="hidden"  class="n-button" value="{{$social['nsData']['btn_network']}}">
                    <input type="hidden"  class="n-icon" value="{{$social['nsData']['icon']}}">
                    <input type="hidden"  class="ns-id" value="{{$social['nsData']['id']}}">
                    <input type="hidden"  class="ns-detail-id" value="{{isset($social['nsUser'])?$social['nsUser']['id']:''}}">
                    
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </form>
  </div>
</div>