<div class="row justify-content-between">
    <div class="card col-sm-7" id="FormModal">
        <div class="col-sm-12">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Create Keypl</h4>
            <button type="button" class="close" onclick="Cards.close()">&times;</button>
          </div>
  
          <!-- Modal body -->
          <div class="modal-body">
            <form id="card-form">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Principal Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#networks">Networks Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#detail">Details Data</a>
                  </li>
                </ul>
  
                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="home" class="container tab-pane active"><br>
                    @include('Cards.itemsCreate.cardForm')
                  </div>
                  <div id="networks" class="container tab-pane fade"><br>
                    @include('Cards.itemsCreate.networkForm')
                  </div>
                  <div id="detail" class="container tab-pane fade"><br>
                    @include('Cards.itemsCreate.detailForm')
                  </div>
                </div>
            </form>
          </div>
  
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success btn-save" onclick="Cards.prev()">Preview <i
              class='fas fa-plus'></i></button>
            <button type="button" class="btn btn-success btn-save" onclick="Cards.save('update',{{$data['id']}})">Update <i
                class='fas fa-plus'></i></button>
            <button type="button" class="btn btn-danger" onclick="Cards.close()" >Cancel <i
                class='fas fa-window-close'></i></button>
          </div>
  
        </div>
    </div>
    <div class="col-sm-4 all-screen">
           <div class="card device-case">
              <div class="mobile-screen" id="mobil-vition" style="background-image: url({{$actual_bg}})">
              @include('Cards.keypl')
              </div>
           </div>
    </div>
  </div>
  