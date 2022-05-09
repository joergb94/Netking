@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/contacs.css') }}">
@endsection
@section('content')
<div class="page-inner">
<div class="card" id="index_blade">
  @include('Friends.items.search')
  <div class="card-body">
    <!--row-->
    @include('Friends.items.table')
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
    <div id="show_blade2" style="display:none">
      <div id="card_show2"></div>
    </div>
@endsection
@section('js')

  <script src="{{asset('js/chart.min.js')}}"></script>
  <script src="{{asset('js/actions/Friends.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

@endsection