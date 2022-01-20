<div class="row justify-content-between">
  <div class="col-12 text-center mx-auto d-block">
    <div class="card">
      <div class="card-header">{{$ci['card_detail']['name']}}</div>
      <div class="card-body">
      <form id="keypls-fom-{{$ci['card_detail']['id']}}" >
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" value="" id="email">
            </div>
            <div class="form-group">
              <label for="comment">Comment:</label>
              <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
            </div>
            <div class="form-group text-center">
                <button type="button"  onclick="Cards.send_email({{$ci['card_detail']['id']}})" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>