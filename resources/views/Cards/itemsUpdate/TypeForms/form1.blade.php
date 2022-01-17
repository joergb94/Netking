<div class="card">
  <div class="card-header">Header</div>
  <div class="card-body">
    <form id="contact-form">
        <div class="form-group">
            <label for="name">Titulo:</label>
            <input type="text" class="form-control"  value ="{{$data->name}}" name="name" placeholder="Mi Titulo" id="name{{$data->id}}">
        </div>
        <div class="form-group">
            <label for="email">Descripcion:</label>
            <input type="email" class="form-control" name="description"   value ="{{$data->description}}" placeholder="MI descripcion" id="description{{$data->id}}">
        </div>
        <div class="form-group text-center">
            <button type="button" class="btn btn-primary" onclick="Cards.save_item({{$data->id}},{{$data->card_item_id}})">Guardar</button>
        </div>
    </form>
  </div>
</div>