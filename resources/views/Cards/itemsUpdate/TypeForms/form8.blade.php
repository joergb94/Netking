<div class="col-12">
  <div class="card-header">
  <button type="button" class="btn btn-link" onclick="Cards.back_principal()"> <h4 class="text-dark"> <i class="fas fa-angle-left"></i>  Agregar PDF</h4></button>
  </div>
  <div class="card-body">
    <form id="file-form-{{$data->id}}">
        <div class="form-group">
            <label for="email">Titulo:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="name" value="{{$data->description}}" id="name{{$data->id}}">
        </div>
        <div class="form-group">
            <label for="PDF">Agregar Archivo PDF:</label>
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input custom-file-input-file" id="description{{$data->id}}" value="{{$data->item_data}}" name="file">
              <label class="custom-file-label" for="PDF">Choose file</label>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="button" class="btn btn-primary" onclick="Cards.save_item_file({{$data->id}},{{$data->card_item_id}})">Guardar</button>
        </div>
    </form>
  </div>
</div>


<script>
// Add the following code if you want the name of the file appear on select
  $(".custom-file-input-file").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>