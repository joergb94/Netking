<div class="card">
  <div class="card-header">Contacto</div>
  <div class="card-body">
    <form id="contact-form">
    <div class="form-group">
            <label for="email">Titulo:</label>
            <input type="email" class="form-control" placeholder="Enter email" value="{{$data->name}}" id="name{{$data->id}}">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" value="{{$data->description}}" id="description{{$data->id}}">
        </div>
        <div class="form-group text-center">
            <button type="button" class="btn btn-primary" onclick="Cards.save_item({{$data->id}},{{$data->card_item_id}})">Guardar</button>
        </div>
    </form>
  </div>
</div>