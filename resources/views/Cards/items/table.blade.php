<div id="index_table">
  <div class="row">
    <!--table section-->
    <div class="col">
      <div class="col-sm-12">
            <div class="row">
              @forelse($data as $Card)
              <div class="col-sm-3">
                  <div class="card"  id="Card{{$Card->id}}" >
                    <div class="card-header text-center">
                      {{ $Card->title }}
                    </div>
                    <div class="card-body text-center">
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