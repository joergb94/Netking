<div id="index_table">
  <div class="row">
    <!--table section-->
    <div class="col">
      <div class="col-sm-12">
            <div class="row">
              @forelse($data as $Card)
              <div class="col-sm-3">
                  <div class="card"  id="Card{{$Card->id}}" >

                    <div class="card-body text-center container-btn">
                    <button class="btn btn-warning btn-show-{{$Card['id']}} btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit({{$Card['id']}})"><i class='fas fa-edit'></i></button>
                       <button type="button" class="btn btn-danger btn-circle top-right btn-delete" style="display:none" onclick="Cards.delete({{$Card['id']}})" > <i class="fa fa-trash"></i></button>
                        <h4>{{ $Card->title }}</h4>
                        {{ $Card->subtitle }}
                    </div> 
                    <div class="card-footer text-center">
                        @include('Cards.items.buttons', ['Card' => $Card])
                    </div>
                  </div>
              </div>
              @empty
              <div class="col-sm-12">
                <div class="card text-center">
                    <br>
                    <h1 class="text-warning">
                      No Keypls
                    </h1>
                    <br>
                </div>
              </div>
              @endforelse
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