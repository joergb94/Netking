<div class="card">
  <div class="card-header">
    <button class="btn btn-secondary btn-circle top-right btn-update"  data-toggle="tooltip" title="Cerrar!" onclick="Profile.close()" >
        <i class="fas fa-times"></i>
    </button>
      Editar Cuenta
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
            <img id="blah{{$data->id}}" style="width: 100%;" src="{{isset($data->image)? asset($data->path.$data->image):asset('img/profile.jpg')}}" alt="your image" />
            </div>
            <div class="col-sm-8">
                <div class="card" style="height:100%;">
                    <form id="profile-form">
                        <div class="form-group">
                            <h5 class="card-title">Name:</h5>
                            <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}" />
                        </div>
                        <div class="form-group">
                            <h5 class="card-title">Street:</h5>
                            <input type="text" class="form-control" name="street" id="street" value="{{$data->street}}" />
                        </div>
                        <div class="form-group">
                            <h5 class="card-title">Correo:</h5>
                            <input type="text" class="form-control" name="email" id="email" value="{{$data->email}}" />
                        </div>
                        <div class="form-group">
                            <h5 class="card-title">Nickname:</h5>
                            <input type="text" class="form-control" name="nickname" id="nickname" value="{{$data->nickname}}" />
                        </div>
                        <div class="form-group">
                            <h5 class="card-title">Telefono:</h5>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{$data->phone}}" />
                        </div>
                        <div class="form-group">
                            <h5 class="card-title">Imagen de perfil:</h5>
                                <div class="custom-file mb-3">
                                  <input type="file" class="custom-file-input custom-file-input-img" id="imgInp{{$data->id}}" value="{{$data->path.$data->image}}" name="image">
                                  <label class="custom-file-label" for="PDF">Choose file</label>
                                </div>
                        </div>     
                    </form>
                </div>
                
            </div>
        </div>
    </div>
  <div class="card-footer">
    <button type="button" class="btn btn-warning  btn-update btn-save float-right" onclick="Profile.save('update',{{$data->id}})">Guardar<i class='fas fa-plus'></i></button>
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