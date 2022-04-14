@extends('layouts.qrview')

@section('content')
<div id="index_blade">
    <a href="/home"><h1 class="text-color-keypl"><i class="fa fa-angle-left"></i></h1></a>
    </br>
    <div id ="index_table">
      <div class="col-12">
        <div class="row">
              <div class="col-12">
                  <div id="qr-reader" class="col-12"></div>

               
                    <div class="col-10 mx-auto d-block">
                      <br>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-qrcode"></i></span>
                        </div>
                        <input type="text" id="qr-reader-results" class="form-control" placeholder="code">
                    </div>
                    
                  </div>
                  
                  <button type="button" class="btn bg-keypl mx-auto d-block" onclick="QR.detail()" > <h3 class="text-white">Ver Keypl <i class="fa fa-arrow-right"></i></h3></button>
              </div>
          </div>
      </div>
      
    </div>
    <div id="loading" style="display:none" class="col-sm-12 text-center">
      </br></br></br>
      <div class="col-sm-12">
        <h2>Loading...</h2>
      </div>
      <div class="spinner-grow text-muted"></div>
      <div class="spinner-grow text-primary"></div>
      <div class="spinner-grow text-info"></div>
      <div class="spinner-grow text-danger"></div>
      <div class="spinner-grow text-secondary"></div>
      </br></br></br></br>
    </div>
  </div>
  <!--card-body-->
</div>
<!--card-->

<!-- Passing BASE URL to AJAX -->
<input id="url" type="hidden" value="{{ \Request::url() }}">
<input id="baseUrl" type="hidden" value="{{ \Request::root() }}">
@endsection
@section('modal')
<div id="show_blade" style="display:none">
  <div id="card_show"></div>
</div>
@endsection
@section('js')
<script src="{{asset('js/html5-qrcode.min.js')}}"></script>
<script src="{{asset('js/actions/scanqr.js')}}"></script>

@endsection