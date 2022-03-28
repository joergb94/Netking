
<div class="row justify-content-between">
    <div class="card col-sm-12 col-md-12 col-lg-7 col-xl-7" id="FormModal">
            <button type="button" class="btn btn-danger btn-circle top-right" onclick="Cards.close()" >
              <i class='fas fa-window-close'></i>
            </button>
          <!-- Modal body -->
          <div id="principalForm"  class="modal-body">
            <div class="row">
              <div class="col-2">
                <!-- Nav tabs -->
                  <ul class="list-group text-center" role="tablist">
                      <li class="nav-item btn-rounded-keypl ">
                        <button class="btn btn-warning-keypl btn-rounded  active" data-toggle="tab" id="btnHead" href="#styleHead"  onclick="transactions.all_toggle()">
                          <h2><i class="fas fa-heading"></i></h2>
                          <h6>Header</h6>
                        </button>
                      </li>
                      <li class="nav-item btn-rounded-keypl">
                        <button class="btn btn-warning-keypl btn-rounded" data-toggle="tab"  id="btnBackground" href="#styleBackground"  onclick="transactions.all_toggle()">
                          <h2><i class="fas fa-brush"></i></h2>
                          <h6>BG</h6>
                        </button>
                      </li>
                      <li class="nav-item btn-rounded-keypl">
                        <button class="btn btn-warning-keypl btn-rounded" data-toggle="tab" id="btnBlocks" href="#styleBlocks"  onclick="transactions.all_toggle()">
                          <h2><i class="fas fa-th"></i></h2>
                          <h6>Blocks</h6>
                        </button>
                      </li>
                      <li class="nav-item btn-rounded-keypl">
                        <button class="btn btn-warning-keypl btn-rounded" data-toggle="tab" id="btnButtons" href="#styleButtons"  onclick="transactions.all_toggle()">
                          <h2><i class="fas fa-stop-circle"></i></h2>
                          <h6>Button</h6>
                        </button>
                      </li>
                      <li class="nav-item btn-rounded-keypl">
                        <button class="btn btn-warning-keypl btn-rounded" data-toggle="tab" id="btnText" href="#styleText"  onclick="transactions.all_toggle()">
                          <h2><i class="fa fa-font"></i></h2>
                          <h6>Text</h6>
                        </button>
                      </li>
                      <li class="nav-item btn-rounded-keypl">
                        <button class="btn btn-warning-keypl btn-rounded" data-toggle="tab" id="btnMore" href="#styleMore"  onclick="transactions.all_toggle()">
                          <h2><i class="fas fa-wrench"></i></h2>
                          <h6>More</h6>
                        </button>
                      </li>
                      <li class="nav-item btn-rounded-keypl ">
                        <button class="btn btn-warning-keypl btn-rounded" id="btnAddNew"data-toggle="tab" href="#addnew"  onclick="Cards.modal_item({{$data['id']}})">
                          <h2><i class="fas fa-plus"></i></h2>
                        </button>
                      </li>
                    </ul>
              </div>
              <div class="col-10">
                <!-- Tab panes -->
                  <form id="card-form-style" >
                    <div class="tab-content">
                            @include('Cards.itemsUpdate.cardForm')
                      <div class="col-sm-12"  style="display:none" >
                          <div id="qrcode" class="mx-auto d-block"></div>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
          </div>
          <div id="show_blade_form" class="modal-body" style="display:none">
                  <div id="card_show_form"></div>
                </div>
    </div>
    <div class="col-sm-4 all-screen mx-auto d-block ">
    <button type="button" class="btn bg-keypl col-6 mx-auto d-block" value="1" id="mode-delete-item" onclick="Cards.mode_delete_item()"><h2>Delete Blocks <i class="fas fa-minus"></i></h2></button>
           <div class="card device-case mx-auto d-block" id="case-mobile">
              @include('Cards.itemsUpdate.keypl')
           </div>    
    </div>
</div>
<script>
  QR.show({{$data['id']}});
</script>
