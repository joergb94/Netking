

<div class="btn-group col-sm-12" id="btn-group-{{$data['card_detail']->id}}">
    <button type="button" class="btn {{$data['item']->style}} btn-block"   onclick="transactions.toggle({{$data['card_detail']->id}})" >
        <h2>{{$data['item']->name}} <i class="{{$data['item']->icon}}"></i></h2>
    </button>
    <button type="button" class="btn {{$data['item']->style}} delete" id="btn-delete-{{$data['card_detail']->id}}" style="display:none"  onclick="Cards.delete_item({{$data['card_detail']->id}},{{$data['card_detail']->card_id}})"><i class="fa fa-trash"></i></button>
</div>
<div class="col-sm-12 divs-data" style="display:none" id="div-{{$data['card_detail']->id}}">
    <br class="br-{{$data['card_detail']->id}}">
    @include('Cards.itemsUpdate.TypeForms.form'.$data['item']->id,['data' => $data['card_detail']])
</div>
<br class="">