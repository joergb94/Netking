

    <div class="card col-sm-12" id="card" style="height:100%;">
    
        <div class="card-header">
        <button class="btn btn-warning btn-circle top-right btn-update" id="button-edit" data-toggle="tooltip" title="Editar Perfil!" onclick="Profile.edit()" ><i class='fas fa-edit'></i></button>
            <div class="jumbotron text-center">
              <h1>{{$dm['user']['name']}} {{$dm['user']['last_name']}} - {{$dm['user']['nickname']}} </h1> 
                <h3>
                    @forelse ($data as $item)
                        <button onclick="Profile.detail(1)" class="btn  btn btn-warning theme3-padding-btn btn-sm" >
                                {{$item['type_memberships']['membership']}} <i class="fas fa-credit-card text-secondary"></i><i class="fas fa-pen text-dark"></i>
                        </button>
                    @empty
                        <button onclick="Profile.detail(1)" class="btn  btn btn-warning theme3-padding-btn btn-sm" >
                            Free <i class="fas fa-credit-card text-secondary"></i><i class="fas fa-pen text-dark"></i>
                        </button>
                    @endforelse
                </h3>
              
           </div>
           <div class="col-12">
               <div class="row">
                <div class="col-sm-3">
                    <h5>Followers <i class="fas fa-shoe-prints text-secondary"></i> {{$follow['followers']['quantity']}}</h5> 
                </div>
                <div class="col-sm-3">
                        <h5>Following <i class="fas fa-shoe-prints text-warning"></i> {{$follow['following']['quantity']}}</h5> 
                </div>
                <div class="col-sm-3">
                        <h5>Keypls <i class="fas fa-qrcode text-secondary"></i> {{$keypls['myKeypls']}}</h5> 
                </div>
                <div class="col-sm-3">
                        <h5>Free Keypls <i class="fas fa-qrcode text-warning"></i> {{$keypls['freeKeypls']}}</h5> 
                </div>
               </div>
              
           </div>
        </div>
        <div class="card-body" id="cardBody">
          <h5 class="card-title">
              <i class="fas fa-envelope"></i> 
              {{$dm['user']['email']}}
         </h5>
         <br>
          <h5 class="card-title">
              <i class="fas fa-phone"></i> 
              {{$dm['user']['phone']}}
         </h5>
         <br>
          <h5 class="card-title">
              <i class="fas fa-map-marker-alt"></i> 
              {{$dm['user']['street']}}
         </h5>
         <br>
        </div>
    </div>
