    <a class="btn btn-info btn-detail-{{$Card['id']}} btn-circle"  data-toggle="tooltip" title="Ver Keypl!"  href="/Keypls/{{$Card['id']}}" target="_blank" ><i class='fa fa-eye'></i></a>
    <button class="btn btn-success btn-detail-{{$Card['id']}} btn-circle"  data-toggle="tooltip" title="Ver Qr!" onclick="Cards.QR({{$Card['id']}})"><i class="fa fa-qrcode"></i></button>