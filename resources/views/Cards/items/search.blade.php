
<div class="bg-search-keypls text-center">
<button type="button" class="btn btn-warning btn-circle top-right" id="mode-delete" onclick="transactions.mode_delete()" value="1" > <i class="fa fa-trash"></i></button>
<h5 class="text-my-keypls" >{{$account->name}} {{$account->last_name}}</h5>
<img src='{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:asset("img/profile.jpg")}}' alt="image profile" class="img-my-keypls">
      <div class="form-group col-6 mx-auto d-block">
        <div class="inner-addon right-addon">
          <i class="glyphicon glyphicon-search"><i class="fas fa-search"></i></i>
          <input type="text" class="form-control search-query" id="search" placeholder="Search" />
        </div>
      </div>
      <br>
      <!--<button type="button" class="btn btn-link float-right" onclick="Cards.graphics()" > Metricas</button>-->
</div>
