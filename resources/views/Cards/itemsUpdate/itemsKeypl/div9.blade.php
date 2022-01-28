
  <div class="col-12 text-center mx-auto d-block ">
    <div class="card {!! $card_style['divs_shape']  == 1?'div-rounded':''!!} text-dark">
      <div class="card-header"> <h3 style="font-family:{{$text_font->name}};">{{$ci['card_detail']['name']}}</h3></div>
      <div class="card-body">
      <form id="keypls-fom-{{$ci['card_detail']['id']}}" >
            <div class="form-group">
                <label for="email" style="font-family:{{$text_font->name}};">Email address:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" value="" id="email">
            </div>
            <div class="form-group">
              <label for="comment" style="font-family:{{$text_font->name}};">Comment:</label>
              <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
            </div>
            <div class="form-group text-center">
                <button type="button"  onclick="Cards.send_email({{$ci['card_detail']['id']}})" class="btn btn-primary {{$btn_shape}}">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
