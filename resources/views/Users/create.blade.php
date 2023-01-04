<div class="modal fade" id="FormModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="user-form">
          <div class="form-group">
            <label>Full Name:</label>
            <input type="text" id="name" name="name" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>Occupation:</label>
            <input type="text" id="occupation" name="occupation" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>Street:</label>
            <input type="text" id="street" name="street" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>Phone:</label>
            <input type="number" id="phone" name="phone" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>E_mail:</label>
            <input type="text" id="email" value="" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label>Password:</label>
            <input type="password" id="password" value="" name="password" class="form-control">
          </div>
          <div class="form-group">
            <label>Confirm Password:</label>
            <input type="password" id="password_confirmation" value="" name="password_confirmation"
              class="form-control">
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-save" onclick="users.save('add')">Create <i
            class='fas fa-plus'></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i
            class='fas fa-window-close'></i></button>
      </div>

    </div>
  </div>
</div>
<script>
  $('.js-example-basic-multiple').select2({
    tags: true,
    placeholder: "Add"
  });
</script>