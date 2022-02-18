@extends('layouts.app')
@section('style')
 <style>
   .canvas {
      border: 1px dotted #FFBF2F;
    }

    .chart-container {
      position: relative;
      margin: auto;
      height: 25vh;
      width: 80vw;
    }
 </style>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('js/actions/Home.js')}}"></script>
@endsection