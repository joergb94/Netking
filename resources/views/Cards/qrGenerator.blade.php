@extends('layouts.app')
@section('content')
<div class="page-inner">
<div class="card" id="index_blade">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-6">
        <h4 class="card-title mb-0">
            Generador de QR  <i class="fas fa-id-card"></i>
        </h4>
      </div>
      <!--col-->
      <div class="col-sm-6">
  
      </div>
      <!--col-->
    </div>
    <!--row-->

    </br>
    <div class="col-sm-12" id="FormModal">
        <!-- Nav pills -->
        <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#qrwifiD">QR para Wifi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#qrlinkD">QR para informacion</a>
        </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
        <div class="tab-pane container active" id="qrwifiD">
            <div class="col-sm-12">
              <div class="row">
                  <div class="col-sm-6">
                    <form>
                      <div  class="form-group" >
                          <label for="SSID">SSID</label>
                          <input id="SSID" class="form-control qr-wifi" type="text" value="ssid">
                      </div>
                      <div  class="form-group">
                        <label for="password">password</label>
                        <input id="password" class="form-control qr-wifi" type="text" value="password">
                      </div>
                      <div class="form-group">
                        <label for="email">Tipo de red:</label>
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" name="type" class="qr-wifi" value="WPA" checked>WPA
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" name="type" class="qr-wifi" value="WEP">WEP
                            </label>
                          </div>
                      </div>
                      <div  class="form-group">
                        <p id="legacy"></p>
                      </div>

                    </form>
                  </div>
                  <div class="col-sm-6">
                    <div id="qrcode-wifi"></div>
                  </div>
              </div>
            </div>
            <div class="col-sm-12 text-center">
                <button class="btn btn-success"  data-toggle="tooltip" title="Descargalo!" onclick="downloadImage('qrcode-wifi')">descargar QR</button>
            </div>
        </div>
        <div class="tab-pane container fade" id="qrlinkD">
              <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                      <form>
                        <div  class="form-group" >
                            <label >Informacion o link</label>
                            <input id="url_qr_generate" class="form-control qr-info" type="text" value="info">
                        </div>
                      </form>
                    </div>
                    <div class="col-sm-6">
                       <div id="qrcodelink"></div>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 text-center">
                  <button class="btn btn-success"  data-toggle="tooltip" title="Descargalo!" onclick="downloadImage('qrcodelink')">descargar QR</button>
              </div>
        </div>
        </div>  
    </div>

  </div>
  <!--card-body-->
</div>
<!--card-->
<!-- Passing BASE URL to AJAX -->
<input id="url" type="hidden" value="{{ \Request::url() }}">
<input id="baseUrl" type="hidden" value="{{ \Request::root() }}">
@endsection
@section('js')
<script>
            var qrcode2 = new QRCode("qrcode-wifi");

            function generateCode() {
            var type = $('input[name=type]:checked').val();
            var ssid = document.querySelector('#SSID').value;
            var password = document.querySelector('#password').value;
            var url = 'WIFI:T:' + type + ';S:' + ssid + ';P:' + password + ';;';
            document.querySelector('#legacy').textContent = url;
            qrcode2.makeCode(url);
            if(type === 'nopass') parseInt(Math.random()*16) ? audio.cloneNode().play() : vacation();
            }
 
            generateCode();

            document.querySelector('#SSID').addEventListener('input', generateCode);
            document.querySelector('#password').addEventListener('input', generateCode);
            $('.qr-wifi').change(generateCode);

            var audio = new Audio();
            audio.src = 'http://nyanpass.com/nyanpass.mp3';

            function vacation() {
            setTimeout(function(){
                audio.cloneNode().play();
            }, 8500);
            document.body.innerHTML='<div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/sl89-kF75FI?start=100&autoplay=1&mute=1&showinfo=0&controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>'
            }

            function downloadImage(name){
                var type = name =='qrcodelink'?1:2;
                var Element = document.querySelector(`#${name} img`);
                var frameSrc = Element.getAttribute('src');
                downloadImg(frameSrc,type);
            }

            function downloadImg(img_base64,type) {
                const linkSource = img_base64;
                const downloadLink = document.createElement("a");
                var name_qr=type == 1?'QrInfo':'QrWifi';
                downloadLink.href = linkSource;
                downloadLink.download =name_qr+'.jpg';
                downloadLink.click();
            }

            var qrcode3 = new QRCode("qrcodelink");

            $('.qr-info').change(qr_link);
            qr_link();
          

            function qr_link(){
              var data = $('#url_qr_generate').val();
               qrcode3.makeCode(data);
            }
         
        </script>
@endsection