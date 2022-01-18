<div class="card">
  <div class="card-header">Agregar Publicacion de Facebook</div>
  <div class="card-body">
    <form id="facebook-form">
        <div class="form-group">
            <label for="email">Titulo:</label>
            <input type="email" class="form-control" placeholder="Enter email" value="{{$data->name}}" id="name{{$data->id}}">
        </div>
        <div class="form-group">
            <label for="newF">codigo de Facebook:</label>
            <textarea class="form-control" rows="5" id="description{{$data->id}}" onchange="$('#datasrc{{$data->id}}').html($('#description{{$data->id}}').val())">{{$data->description}}</textarea>
            <div class="col-sm-12" style="display:none" id="datasrc{{$data->id}}"></div>
        </div>
        <div class="form-group text-center">
            <button type="button" class="btn btn-primary" onclick="Cards.save_item({{$data->id}},{{$data->card_item_id}})">Guardar</button>
        </div>
    </form>
  </div>
</div>