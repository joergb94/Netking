<div id="index_table" class="container">
  <h2>Estos son tus grupos</h2>
  <div id="container-groups">
      <div class="row">
            @foreach($groups as $group)
            <div class="col-3 col-md-1">
                <div class="card div-friends text-groups">
                <button class="btn btn-warning btn-show btn-circle btn-sm top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Friends.edit({{$group['id']}})"><i class="fas fa-pen"></i></button>
                    <h3 class="friends-centered">{{strtoupper(substr($group->name, 0,2))}}</h3>
                </div>
                <p class="">{{$group->name}}</p>
            </div>
            @endforeach
            <div class="col-3 col-md-1" onclick="Friends.create()">
                <div class="card div-friends">
                    <h3 class="friends-centered"><i class="fas fa-plus"></i></h3>
                </div>
            </div>
      </div>
   
    </div>

</div>
