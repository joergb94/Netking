@forelse($data['friendsGroups'] as $friend)
                        <div id ="friend{{$friend['group']['id']}}" class="col-6 col-sm-4 col-md-4 col-lg-2">
                            <div class="col-12">
                                <div class="row ">
                                    <div class="text-groups col-12  friend_groups_edit mx-auto d-block" 
                                        style="background-image:url('{{(isset($friend['friends']['image']))? $friend['friends']['path'].$friend['friends']['image']:asset('img/profile.jpg')}}');
                                                background-repeat: no-repeat;
                                                background-size:100% 100%;">
                                      <button class="btn btn-warning btn-show btn-circle  top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Friends.delete({{$friend['group']['id']}})"><i class="fa fa-times"></i></button>
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
                                <div onclick="Friends.addgroup({{$data['group']['id']}})" class="btn text-groups col-12  bg-search-keypls friend_groups_edit mx-auto d-block">
                                    <i class="friends-centered mega_icon fa fa-plus"></i>
                                </div>       
                            </div>
                        </div>