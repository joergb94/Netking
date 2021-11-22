<div class="modal fade" id="FormModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="category-form">
          <div class="form-group">
            <label>Category name:</label>
            <input type="text" id="name" name="name" value="{{$data->name}}" class="form-control">
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-save" onclick="categories.save('update',{{$data->id}})">Update
          <i class='fas fa-edit'></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i
            class='fas fa-window-close'></i></button>
      </div>

    </div>
  </div>
</div>