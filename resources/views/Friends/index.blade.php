@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/contacs.css') }}">
    <style>
      .btn-header-links {
    padding-top: 5px;
    padding-bottom: 15px;
    overflow-x: scroll;
    display: inline-block;
    white-space: nowrap;
    transition: 1s ease;
}
.padding-align{
    padding-left: 4em !important;
    padding-right: 4em !important;
}

.top-adjust {
    top: 1.4em;
}

.btn-header-links button {
    border-radius: 8px;
}


/*scroller parent style*/

.scroller {
    position: relative;
    overflow: hidden;
    margin-top: -0.5%;
}



/*left arrow styles*/
.left-btn-scroller {
    position: absolute;
    left: 0%;
    top: 0.6em;
    font-size: 22px;
    color: #3f3f3f;
    bottom: 0;
    width: 55px;
    height: 55px;
    background-color: rgba(242, 242, 242, 0.94);
    z-index: 1002;
    border-radius: 50%;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;

}


/*right arrow styles*/
.right-btn-scroller {
    position: absolute;
    right: 0%;
    top: 0.6em;
    font-size: 22px;
    color: #3f3f3f;
    bottom: 0;
    width: 55px;
    cursor: pointer;
    height: 55px;
    background-color: rgba(242, 242, 242, 0.94);
    border-radius: 50%;
    z-index: 1002;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
    display: flex;
    align-items: center;
    justify-content: center;
}

.opacity-0 {
    opacity: 0;
}

/*********************/
/*button styles*/
.btn-pin {
border:0;
color:#fff;
    font-weight: normal;
    text-transform: capitalize;
        -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
}


.btn-bg1 {
    background-color: rgb(53, 35, 28) !important;
}

.btn-bg2 {
    background-color: rgb(170, 114, 92) !important;
}

.btn-bg3 {
    background-color: rgb(59, 59, 59) !important;
}

.btn-bg4 {
    background-color: rgb(154, 188, 160) !important;
}

.btn-bg5 {
    background-color: rgb(220, 107, 97) !important;
}

.btn-bg6 {
    background-color: #7F6364 !important;
}

.btn-bg7 {
    background-color: #142935 !important;
}

.btn-bg8 {
    background-color: #9C0001 !important;
}

.btn-bg9 {
    background-color: #9E8462 !important;
}

.btn-bg10 {
    background-color: #3B78C1 !important;
}




/*mobile responsive*/
@media (max-width: 575.98px) {
   
    .padding-align{
        padding: 0 !important;
    }

    .top-adjust {
        top: 3%;
    }
    .left-btn-scroller {
     
        display: none;
    }

    .right-btn-scroller {
     
        display: none;

    }
}
    </style>
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