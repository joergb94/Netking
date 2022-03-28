<div class="col-12">
  <div class="card-header">
   <button type="button" class="btn btn-link" onclick="Cards.back_principal()"> <h4 class="text-dark"> <i class="fas fa-angle-left"></i> Header</h4></button>
  </div>
  <div class="card-body">
    <form id="file-form-{{$data->id}}">
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
                  <img id="blah{{$data->id}}" class="mx-auto d-block img-fluid" src="{{isset($data['item_data'])? asset($data['item_data']):asset('img/profile.jpg')}}" alt="your image" />
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="PDF">Agregar Imagen:</label>
                <div class="custom-file mb-3">
                  <input type="file" class="custom-file-input custom-file-input-img" id="imgInp{{$data->id}}" value="{{$data['item_data']}}" name="file">
                  <label class="custom-file-label" for="PDF">Choose file</label>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Titulo:</label>
                <input type="text" class="form-control"  value ="{{$data->name}}" name="name" placeholder="Mi Titulo" id="name{{$data->id}}">
            </div>
            </div>
          </div>
          </div>
          <div class="form-group">
              <label for="email">Descripcion:</label>
              <input type="text" class="form-control" name="description"   value ="{{$data->description}}" placeholder="MI descripcion" id="description{{$data->id}}">
          </div>
        <div class="form-group text-center">
            <button type="button" class="btn btn-primary" onclick="Cards.save_item_file({{$data->id}},{{$data->card_item_id}})">Guardar</button>
        </div>
    </form>
  </div>
</div>
<script>

  document.getElementById('imgInp{{$data->id}}').onchange = evt => {
    const [file] = document.getElementById('imgInp{{$data->id}}').files
    if (file) {

      document.getElementById('blah{{$data->id}}').src = URL.createObjectURL(file)
    }
  }
  $(".custom-file-input-img").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>