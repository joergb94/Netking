
<div class="bg-search-keypls text-center">
<button type="button" class="btn btn-warning btn-circle top-right" id="mode-delete" onclick="transactions.mode_delete()" value="1" ><i class="fas fa-pen"></i></button>
    <h1>{{$account->name}} {{$account->last_name}}</h1>
      @include('Friends.items.itemsGroup')
</div>

<div class="form-group col-10 mx-auto d-block">
        <div class="inner-addon right-addon">
          <i class="glyphicon glyphicon-search"><i class="fas fa-search"></i></i>
          <input type="text" class="form-control search-query" id="search" placeholder="Search" />
        </div>
</div>
