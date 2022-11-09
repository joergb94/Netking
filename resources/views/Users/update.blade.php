<div class="modal fade" id="FormModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="user-form">
          <div class="form-group">
            <label>Full name(s):</label>
            <input type="text" id="name" name="name" value="{{$data->name}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Occupation:</label>
            <input type="text" id="occupation" name="occupation" value="{{$data->occupation}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Street:</label>
            <input type="number" id="street" name="street" value="{{$data->street}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Phone:</label>
            <input type="number" id="phone" name="phone" value="{{$data->phone}}" class="form-control">
          </div>
          <div class="form-group">
            <label>E-mail:</label>
            <input type="text" id="email" value="{{$data->email}}" name="email" class="form-control">
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-save" onclick="users.save('update',{{$data->id}})">Update <i
            class='fas fa-edit'></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i
            class='fas fa-window-close'></i></button>
      </div>

    </div>
  </div>
</div>
<script>
  $('.js-example-basic-multiple').select2({
    tags: true,
    placeholder: "Update"
  });
</script>