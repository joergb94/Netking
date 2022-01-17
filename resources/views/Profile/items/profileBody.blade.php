<div class="row" style="padding-top: 3%; padding-bottom: 10%">
    <div class="card col-sm-12" id="card" >
        <button class="btn btn-warning btn-circle top-right btn-update" id="button-edit" data-toggle="tooltip" title="Editar Perfil!" onclick="Profile.edit()" ><i class='fas fa-edit'></i></button>
        <div class="card-header">
          Detalles de usuario
        </div>
        <div class="card-body" id="cardBody">
          <h5 class="card-title">Correo:</h5>
          <p class="card-text">{{$dm['user']['email']}}</p>
         <h5 class="card-title">Nickname:</h5>
         <p class="card-text">{{$dm['user']['nickname']}}</p>
         <h5 class="card-title">Telefono:</h5>
         <p class="card-text">{{$dm['user']['phone']}}</p>
         <h5 class="card-title">Tipo de membresia:</h5>
         <p class="card-text">
             @forelse ($data as $item)
                 {{$item['type_memberships']['membership']}},
             @empty
                 ninguna membresia
             @endforelse
         </p>
        </div>
        <div class="card-footer text-muted" id="cardFooter">
          
        </div>
      </div>
</div>