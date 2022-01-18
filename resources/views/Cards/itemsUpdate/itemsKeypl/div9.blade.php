<div class="row justify-content-between">
  <div class="card">
    <div class="card-header">Contacto</div>
    <div class="card-body">
    <form action="mailto:{{$data->description}}" method="post" enctype="text/plain">
          <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" placeholder="Enter email" value="{{$data->description}}" id="email">
          </div>
          <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </form>
    </div>
  </div>
</div>