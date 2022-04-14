@extends('layouts.start')
@section('style')
<style>
  /* Mark input boxes that gets an error on validation: */
  input.invalid {
    background-color: #ffdddd;
  }

  /* Hide all steps by default: */
  .tab {
    display: none;
  }

  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 10px 2px;
    background-color: #bbbbbb;
    border: none;  
    border-radius: 50%;
    display: inline-block;
 
  }

  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #FFBF2F!important;
  }

  .step-1{
    width: 80px;
    margin: 10px 2px;
    background-color: #bbbbbb;
    border: none;  
    border-radius: 50%;
    display: inline-block
  }


</style>
@endsection
@section('content')
<div class="col-12 bg-white">
    <a id="prevBtn" onclick="nextPrev(-1)" href="#"><h1 class="text-dark"><i class="fa fa-angle-left"></i></h1></a>

    <div class="row justify-content-center">
        <div class="col-12">
            <form id="regForm" action="/action_page.php">
                    <div class="tab">
                        @include('getstart.items.name')
                    </div>
                    <div class="tab">
                        @include('getstart.items.description')
                    </div>
                    <div class="tab">
                        @include('getstart.items.uploadImage')
                    </div>
                    <div class="tab">
                        @include('getstart.items.getstart')
                    </div>
                      <!-- Circles which indicates the steps of the form: -->
                      <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                    <div class="col-12 col-sm-4 mx-auto d-block" style="overflow:auto;">
                        <button type="button" class="btn bg-keypl btn-block" id="nextBtn" onclick="nextPrev(1)">SIGUIENTE PASO</button>
                    </div>
                  
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
  <script src="{{asset('js/actions/getstart.js')}}"></script>
@endsection
