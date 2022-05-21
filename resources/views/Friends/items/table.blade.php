<div >
  <div class="row">
    <!--table section-->
  
      <div class="container">
            <div class="row">
              @forelse($data as $friend)
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
                                    @include('Friends.items.buttons', ['friend' => $friend])
                                </div>
                            </div>
                        </div>
              @empty
                <div class="col-12 text-center">
                    <img class="keypl-img-not-found-2 mx-auto d-block" src="{{asset('img/nofound.png')}}">
                    <h1>Oops!</h1>
                    <h2>Looks like you haven't added any friends yet.</h2>
                    <a href="/home" class="btn btn-link">Meet people</a>
                </div>
          
              @endforelse
            </div>
      </div>
   
    <!--pagination section-->
    <div class="col-sm-12">
      <div class="row">
        <div class="col-7">
          <div class="float-left">
            {!! $data->total() !!} {{ trans_choice('Contac|Contacs', $data->total()) }}
          </div>
        </div>
        <!--col-->
        <div class="col-5">
          <div class="float-right">
            {!! $data->render() !!}
          </div>
        </div>
        <!--col-->
      </div>
      <!--row-->
    </div>
  </div>
</div>