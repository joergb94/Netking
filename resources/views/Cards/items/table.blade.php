<div id="index_table">
  <div class="row">
    <!--table section-->
    <div class="col">
      <div class="col-sm-12">
            <div class="row">
              @forelse($data as $Card)
              <div class="col-6 col-sm-4">
                  <div class="card"  id="Card{{$Card->id}}">
                  <div class="card-body text-center container-btn keypls-card">
                                    
                                    @if($Card->card_styles[0]->background_color)
                                        <div class="keypl-background mx-auto d-block div-rounded"  style="background-color:{{$Card['background_image_color']}}; color:{{$Card->color}};">
                                        @else
                                        <div class="keypl-background mx-auto d-block div-rounded"  style="background-image: url('{{$Card->img_path}}{{$Card->img_name}}'); color:{{$Card->color}}; background-size:cover; background-repeat:no-repeat;" >
                                        @endif
                                        <button class="btn btn-warning btn-show-{{$Card['id']}} btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit({{$Card['id']}})"><i class='fas fa-edit'></i></button>
                                        <button type="button" class="btn btn-danger btn-circle top-right btn-delete" style="display:none" onclick="Cards.delete({{$Card['id']}})" > <i class="fa fa-trash"></i></button>
                                            <img class="keypl-img rounded-circle" src="{{(isset($Card->img))? $Card->img:asset('img/profile.jpg')}}" alt="{{ $Card->title }}">
                                        </div> 

                                        <div class="mx-auto d-block keypl-title">
                                            <h4>{{ $Card->title }}</h4>
                                            <p class="text-keypl mx-auto d-block">{{ $Card->subtitle }}</p>
                                        </div>
                                        
                                    </div> 
                    <div class="card-footer text-center footer-keypl btn-update">
                        @include('Cards.items.buttons', ['Card' => $Card])
                    </div>
                  </div>
              </div>
              @empty
              @endforelse
                <div class="col-6 col-sm-4">
                  <div class="card">
                          <button  class="btn btn-light keypls-card  btn-block" onclick="Cards.create()" >
                            <h1><i class="fa fa-plus"></i></h1>
                            <h3>Add new keypl</h3>
                          </button>
                  </div>
              </div>
            </div>
      </div>
    </div>
    <!--pagination section-->
    <div class="col-sm-12">
      <div class="row">
        <div class="col-7">
          <div class="float-left">
            {!! $data->total() !!} {{ trans_choice('Keypl|Keypls', $data->total()) }}
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