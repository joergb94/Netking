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
            <h1 class="text-center" id="group-name-texts">{{strtoupper(substr($data['group']['name'], 0,2))}}</h1>

    </div>
    <div class="col-sm-6 mx-auto d-block text-center">
        <label for="">NOMBRE DEL GRUPO</label>
        <input type="text" class="form-control" id="group-name" onchange="transactions.add_text()"  value="{{$data['group']['name']}}" placeholder="My friends" />
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
                    @forelse($data['friendsGroups'] as $friend)
                        <div class="col-6 col-sm-4 col-md-4 col-lg-2">
                            <div class="col-12">
                                <div class="row ">
                                    <div class="text-groups col-12  friend_groups_edit mx-auto d-block" 
                                        style="background-image:url('{{(isset($friend['friends']['image']))? $friend['friends']['path'].$friend['friends']['image']:asset('img/profile.jpg')}}');
                                                background-repeat: no-repeat;
                                                background-size:100% 100%;">
                                      <button class="btn btn-warning btn-show btn-circle  top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Friends.edit()"><i class="fa fa-times"></i></button>
                                    </div>
                                    <div class="col-12 col-sm-10 col-md-10 col-lg-10 text-center mx-auto d-block">
                                        <h5 class="text-groups text-dark"><b>{{$friend['friends']['name']}} {{$friend['friends']['last_name']}}</b></h5>
                                        {{$friend['cards']['title']}}
                                    </div>       
                                </div>
                            </div>

                        </div>
                    @empty
                    @endforelse

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="text-groups col-12  bg-search-keypls friend_groups_edit mx-auto d-block">
                                    <i class="friends-centered mega_icon fa fa-plus"></i>
                                </div>       
                            </div>
                        </div>
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
