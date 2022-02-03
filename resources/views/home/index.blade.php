@extends('layouts.app')
@section('style')

@endsection
@section('content')
<div class="page-inner">

<!--card-->
@include('home.'.$dm['type_membership']['membership'].'.content')
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