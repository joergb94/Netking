<div id="index_table">
  <div class="row">
    <!--table section-->
    <div class="col">
      <div class="col-sm-12">
            <div class="row">
              @forelse($data as $Card)
              <div class="col-sm-3">
                @if($Card->card_styles[0]->background_color)
                  <div class="card keypls-card"  id="Card{{$Card->id}}" style="background-color:{{$Card['background_image_color']}}; color:{{$Card->color}};">
                @else
                  <div class="card keypls-card"  id="Card{{$Card->id}}" style="background-image: url('{{$Card->img_path}}{{$Card->img_name}}'); color:{{$Card->color}};" >
                @endif

                    <div class="card-body text-center container-btn">
                    <button class="btn btn-warning btn-show-{{$Card['id']}} btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit({{$Card['id']}})"><i class='fas fa-edit'></i></button>
                       <button type="button" class="btn btn-danger btn-circle top-right btn-delete" style="display:none" onclick="Cards.delete({{$Card['id']}})" > <i class="fa fa-trash"></i></button>
                        <h4>{{ $Card->title }}</h4>
                        <p class="text-keypl">{{ $Card->subtitle }}</p>
                    </div> 
                    <div class="card-footer text-center footer-keypl">
                        @include('Cards.items.buttons', ['Card' => $Card])
                    </div>
                  </div>
              </div>
              @empty
              @endforelse
                <div class="col-sm-3">
                          <button  class="btn btn-light keypls-card  btn-block" onclick="Cards.create()" ><h1><i class="fa fa-plus"></i></h1></button>
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