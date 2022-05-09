
       <div class="row justify-content-between">
                @foreach($cardItems as $key => $ci)
                @if($ci['item']->id == 2)
                @if(isset($ci['item']))
                     <div class="col-12  theme4-padding" id="div-{{$ci['card_detail']->id}}">
                     <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$ci['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                     <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$ci['card_detail']->id}},{{$ci['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                         @if($ci['item']->id == 5)
                            @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>$ci['card_detail']['item_data'],'theme_shape'=>'theme4-shape4 mx-auto d-block'])
                        @else
                            @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>'100%','theme_shape'=>'theme4-shape4 mx-auto d-block'])
                        @endif
                    </div>
                    @else
                        <div class="col-12  theme4 theme{{$data['themes_id']}}-padding" id="drop{{$cardItems[5]['card_detail']->id}}"  >
                            @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[5]['card_detail']->id])
                        </div> 
                        @endif
                @else
                @if(isset($ci['item']))
                    <div class="col-12 theme4-col-12 theme4-padding" id="div-{{$ci['card_detail']->id}}">
                    <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$ci['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                    <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$ci['card_detail']->id}},{{$ci['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                         @if($ci['item']->id == 5)
                            @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>$ci['card_detail']['item_data'],'theme_shape'=>'theme4-shape4 mx-auto d-block'])
                        @else
                            @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>'100%','theme_shape'=>'theme4-shape4 mx-auto d-block'])
                        @endif
                    </div>
                    @else
                        <div class="col-12  theme4 theme{{$data['themes_id']}}-padding" id="drop{{$cardItems[5]['card_detail']->id}}"  >
                            @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[5]['card_detail']->id])
                        </div> 
                    @endif
                @endif
                @endforeach
            </div>