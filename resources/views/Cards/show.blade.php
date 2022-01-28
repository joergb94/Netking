<div class="modal fade" id="FormModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">QR Keypl</h4>
        <button type="button" class="close btn btn-outline-danger" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <div class="row">
              <div class="col-sm-12">
                  <div id="qrcode" class="mx-auto d-block"></div>
              </div>
              <div class="col-sm-12">
                <br>
                  <button type="button" id="button_link"  class="btn btn-secondary text-dark btn-block" onclick="QR.copy_link()" value="{{ \Request::root() }}/Keypls/{{$data->id}}"><strong>Copiar </strong> {{ \Request::root() }}/Keypls/{{$data->id}} 
                      <i id="iconCopyB" class="fa fa-copy"></i> 
                      <i id="iconCopyA" style="display:none;" class="fa fa-clipboard-check text-white"></i>
                    </button>
                <br>
                <button type="button"  class="btn btn-gray text-white btn-block" onclick="QR.download({{$data->id}})" ><strong>Descargar</strong> QR 
                    <i id="iconDB" class="fa fa-file-download"></i>
                    <i  id="iconDA" style="display:none;" class="fa fa-file-download text-dark"></i>
                </button>
                <br>
              </div>
          </div>
      </div>

    </div>
  </div>
</div>
<script>
     QR.show({{$data->id}});  
</script>