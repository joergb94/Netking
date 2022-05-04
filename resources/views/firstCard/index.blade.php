@extends('layouts.app')
@section('style')
  <link rel="stylesheet" href="{{ asset('css/editkeypl.css') }}">
@endsection
@section('content')
<div class="page-inner">
    <div id="index_blade">
    @include('firstCard.create')
    <!--card-->
    </div>

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

  <script src="{{asset('js/actions/Cards.js')}}"></script>
@endsection