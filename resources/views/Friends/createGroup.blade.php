<div class="card add-groups">
    <div class="bg-search-keypls text-center">
        <button type="button" class="btn btn-danger btn-circle top-right" onclick="Friends.close()" >
            <i class='fas fa-window-close'></i>
        </button>

        <h1>{{$data['user']->name}} {{$data['user']->last_name}}</h1>
    </div>
    <br>
    <div class="div-group-name bg-secondary mx-auto d-block text-center">
            <br><br>
            <h1 class="text-center" id="group-name-texts"></h1>

    </div>
    <div class="col-sm-6 mx-auto d-block text-center">
        <label for="">NOMBRE DEL GRUPO</label>
        <input type="text" class="form-control" id="group-name" onchange="transactions.add_text()"  placeholder="My friends" />
    </div>
    <div class="form-group col-10 mx-auto d-block">
            <div class="inner-addon right-addon">
            <i class="glyphicon glyphicon-search"><i class="fas fa-search"></i></i>
                <input type="text" class="form-control search-friends-add bg-search-keypls" id="search-add-group" onchange="transactions.search_add()" placeholder="Search" />
            </div>
    </div>
    <div class="card-body">
    
    <div class="container">
            <div id="friends-list" class="row">
                    @forelse($data['friends'] as $friend)
                        <div class="col-10 mx-auto d-block">
                            <div class="row">
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-4">
                                            <img  src="{{(isset($friend['users']['image']))? $friend['friends']['path'].$friend['friends']['image']:asset('img/profile.jpg')}}" class="rounded-circle friend-img float-right" alt="Cinque Terre">
                                        </div>
                                        <div class="col-8 text-left">
                                            <h5>{{$friend['friends']['name']}} {{$friend['friends']['last_name']}}</h5>
                                            {{$friend['cards']['title']}}
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-4 text-center">
                                    <label class="container-checkbox-keypl float-right">
                                        <input type="checkbox" class="groupf" value="{{$friend['friends']['id']}}">
                                        <span class="checkmark-keypl"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <img class="keypl-img-not-found-2 mx-auto d-block" src="{{asset('img/nofound.png')}}">
                            <h1>Oops!</h1>
                            <h2>We can't find the keypl you're looking for.</h2>
                        </div>
                    @endforelse
            </div>
    </div>
    <div id="loading" style="display:none" class="col-sm-12 text-center">
      </br></br></br>
      <div class="col-sm-12">
        <h2>Loading...</h2>
      </div>
      <div class="spinner-grow text-muted"></div>
      <div class="spinner-grow text-primary"></div>
      <div class="spinner-grow text-info"></div>
      <div class="spinner-grow text-danger"></div>
      <div class="spinner-grow text-secondary"></div>
      </br></br></br></br>
    </div>
  </div>
  <div class="col-12 footer-add-groups">
    <div class="col-sm-10 mx-auto d-block">
        <button type="button" class="btn btn-yellow-keypls btn-block" onclick="Friends.save('add')" >Confirmar</button>
    </div>
  </div>
</div>
