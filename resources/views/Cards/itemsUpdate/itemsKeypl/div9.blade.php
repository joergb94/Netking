<div class="row justify-content-between">
  <div class="col-12 text-center mx-auto d-block">
    <div class="card">
      <div class="card-header">Contacto</div>
      <div class="card-body">
      <form action="mailto:{{$data->description}}" method="post" enctype="text/plain">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" placeholder="Enter email" value="" id="email">
            </div>
            <div class="form-group">
              <label for="comment">Comment:</label>
              <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>