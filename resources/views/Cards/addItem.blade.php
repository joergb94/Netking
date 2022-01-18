<button type="button" class="btn {{$data['item']->style}} btn-block"   onclick="transactions.toggle({{$data['card_detail']->id}})" ><h2>{{$data['item']->name}} <i class="{{$data['item']->icon}}"></i></h2></button>
<div class="col-sm-12 divs-data" style="display:none" id="div-{{$data['card_detail']->id}}">
    <br>
    @include('Cards.itemsUpdate.TypeForms.form'.$data['item']->id,['data' => $data['card_detail']])
</div>
<br>