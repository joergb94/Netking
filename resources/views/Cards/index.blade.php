@extends('layouts.app')
@section('style')

@endsection
@section('content')
<div class="page-inner">
<div class="card" id="index_blade">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-6">
        <h4 class="card-title mb-0">
          Cards  <i class='fa fa-qrcode'></i>

        </h4>
      </div>
      <!--col-->
      <div class="col-sm-6">
        @include('Cards.items.header-buttons')
      </div>
      <!--col-->
    </div>
    <!--row-->

    </br>
    <div class="col-sm-12">
      @include('Cards.items.search')
    </div>
    @include('Cards.items.table')
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


<!-- show_blade -->
<div id="show_blade" style="display:none">
  <div id="card_show"></div>
</div>
</div>
<!-- Passing BASE URL to AJAX -->
<input id="url" type="hidden" value="{{ \Request::url() }}">
<input id="baseUrl" type="hidden" value="{{ \Request::root() }}">
@endsection
@section('modal')
    @include('Cards.items.modal')
@endsection
@section('js')
  <script src="{{asset('js/actions/Cards.js')}}"></script>
@endsection