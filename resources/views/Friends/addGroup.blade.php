<!-- The Modal -->
<div class="modal fade" id="modaladdgroup">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add to group</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group col-10 mx-auto d-block">
            <div class="inner-addon right-addon">
            <i class="glyphicon glyphicon-search"><i class="fas fa-search"></i></i>
                <input type="text" class="form-control search-friends-add bg-search-keypls" id="search-add-group-edit" onchange="transactions.search_add()" placeholder="Search" />
            </div>
        </div>
            <div id="friends-list-edit" class="row">
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
                                        <input type="checkbox" class="groupeditf" value="{{$friend['friends']['id']}}">
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
      <!-- Modal footer -->
      <div class="modal-footer">
                <div class="col-sm-10 mx-auto d-block">
                    @if(count($data['friends']) > 0)
                        <button type="button" class="btn btn-yellow-keypls btn-block" onclick="Friends.save_friend({{$data['group']['id']}})" >Add group</button>
                    @endif
                </div>
      </div>

    </div>
  </div>
</div>