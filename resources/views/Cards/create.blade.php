
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
                  <a class="nav-link" data-toggle="tab" href="#menu1">Networks Data</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu2">Details Data</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                  @include('Cards.itemsCreate.cardForm')
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                  @include('Cards.itemsCreate.networkForm')
                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                  <h3>Details Data</h3>
                </div>
              </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-save" onclick="Cards.prev()">Preview <i
            class='fas fa-plus'></i></button>
          <button type="button" class="btn btn-success btn-save" onclick="Cards.save('add')">Create <i
              class='fas fa-plus'></i></button>
          <button type="button" class="btn btn-danger" onclick="Cards.close()" >Cancel <i
              class='fas fa-window-close'></i></button>
        </div>

      </div>
  </div>
  <div class="col-sm-4 all-screen">
         <div class="card device-case">
            <div class="mobile-screen" id="mobil-vition">
            @include('Cards.keypl')
            </div>
         </div>
  </div>
</div>
