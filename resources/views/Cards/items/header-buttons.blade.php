<div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
  <div class="col-sm-12">

        <div class="btn-group">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" onchange="transactions.mode_delete()" id="idChk-sm">
              <label class="custom-control-label-delete" for="idChk-sm"><h3><i class="fa fa-trash"></i></h3></label>
            </div>
            <button class="btn btn-success ml-1 btn-create" onclick="Cards.create()" data-toggle="tooltip">
               Create
            <i class='fas fa-plus'></i></button>
        </div>
  </div>
</div>