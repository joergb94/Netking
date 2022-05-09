
       <div class="row justify-content-between">
                @foreach($cardItems as $key => $ci)
                @if(isset($ci['item']))
                    @if($ci['item']->id == 2)

                        <div class="dashed col-12  theme4-padding" id="drop{{$ci['card_detail']->id}}" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)">
                            <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$ci['card_detail']->id}}">
                                <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$ci['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$ci['card_detail']->id}},{{$ci['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                    @if($ci['item']->id == 5)
                                        @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>$ci['card_detail']['item_data'],'theme_shape'=>'theme4-shape4 mx-auto d-block'])
                                    @else
                                        @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>230,'theme_shape'=>'theme4-shape4 mx-auto d-block'])
                                    @endif
                            </div>
                        </div>
                    @else
                        <div class="dashed col-12 theme4-col-12 theme4-padding" id="drop{{$ci['card_detail']->id}}" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)">
                            <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$ci['card_detail']->id}}">
                                <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$ci['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$ci['card_detail']->id}},{{$ci['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                    @if($ci['item']->id == 5)
                                        @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>$ci['card_detail']['item_data'],'theme_shape'=>'theme4-shape4 mx-auto d-block'])
                                    @else
                                        @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>230,'theme_shape'=>'theme4-shape4 mx-auto d-block'])
                                    @endif
                            </div>
                        </div>
                    @endif
                @else
                    <div class="col-12  theme4 theme{{$data['themes_id']}}-padding btn-default-theme4" id="drop{{$ci['card_detail']->id}}"  >
                         @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $ci['card_detail']->id])
                    </div> 
                @endif                   
                @endforeach
            </div>