

  
            <div class="row justify-content-between">
                    @if(isset($cardItems[0]))
                        @if(isset($cardItems[0]['item']))
                            <div class="col-12 dashed theme2-padding theme-2" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[0]['card_detail']->id}}">
                                <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[0]['card_detail']->id}}">
                                    <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[0]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                    <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[0]['card_detail']->id}},{{$cardItems[0]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[0]['item']->id,['ci' => $cardItems[0],'template'=>200,'theme_shape'=>'theme2-shape'])
                                </div>
                            </div>
                        @else
                            <div class="col-12  drop theme-2  theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[0]['card_detail']->id}}"  >
                                @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[0]['card_detail']->id])
                            </div> 
                        @endif
                    @endif
                    @if(isset($cardItems[1]))
                        @if(isset($cardItems[1]['item']))
                            <div class="col-12 dashed theme2-padding-social theme-2" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[1]['card_detail']->id}}">
                                <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[1]['card_detail']->id}}">
                                    <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[1]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                    <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[1]['card_detail']->id}},{{$cardItems[1]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[1]['item']->id,['ci' => $cardItems[1],'template'=>200,'theme_shape'=>'theme2-shape'])
                                </div>
                            </div>
                        @else
                            <div class="col-12 theme-2  drop  theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[1]['card_detail']->id}}"  >
                                @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[1]['card_detail']->id])
                            </div> 
                        @endif
                    @endif
                    @if(isset($cardItems[2]))
                    <div class="col-6 theme-2" >
                        <div class="row theme-2">
                            @if(isset($cardItems[2]))
                                @if(isset($cardItems[2]['item']))
                                    <div class="col-12 dashed theme2-padding theme2-col-md" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[2]['card_detail']->id}}">
                                        <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[2]['card_detail']->id}}">
                                            <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[2]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[2]['card_detail']->id}},{{$cardItems[2]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[2]['item']->id,['ci' => $cardItems[2],'template'=>180,'theme_shape'=>'theme2-shape'])
                                        </div>
                                    </div>
                                    @else
                                        <div class="drop col-12 theme2-col-md  theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[2]['card_detail']->id}}"  >
                                             @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[2]['card_detail']->id])
                                        </div> 
                                    @endif
                            @endif
                            @if(isset($cardItems[3]))
                                @if(isset($cardItems[3]['item']))
                                    <div class="col-12 dashed theme2-padding theme2-col-md" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[3]['card_detail']->id}}">
                                        <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[3]['card_detail']->id}}">
                                            <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[3]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[3]['card_detail']->id}},{{$cardItems[3]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[3]['item']->id,['ci' => $cardItems[3],'template'=>180,'theme_shape'=>'theme2-shape'])
                                        </div>
                                    </div>
                                @else
                                    <div class="drop col-12 theme2-col-md  theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[3]['card_detail']->id}}"  >
                                        @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[3]['card_detail']->id])
                                    </div> 
                                @endif
                            @endif
                        </div>
                    </div>
                    @endif
                    @if(isset($cardItems[4]))
                    <div class="col-6 theme-2">
                        <div class="row theme-2">
                            @if(isset($cardItems[4]))
                                @if(isset($cardItems[4]['item']))
                                    <div class="col-12 dashed theme2-padding theme2-col-sm" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[4]['card_detail']->id}}">
                                        <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[4]['card_detail']->id}}">
                                            <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[4]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[4]['card_detail']->id}},{{$cardItems[4]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[4]['item']->id,['ci' => $cardItems[4],'template'=>'100%','theme_shape'=>'theme2-shape'])
                                        </div>
                                    </div>
                                @else
                                    <div class="drop col-12 theme2-col-sm  theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[4]['card_detail']->id}}"  >
                                         @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[4]['card_detail']->id])
                                    </div> 
                                 @endif
                            @endif
                            @if(isset($cardItems[5]))
                                @if(isset($cardItems[5]['item']))
                                    <div class="col-12 dashed theme2-padding theme2-col" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[5]['card_detail']->id}}">
                                        <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[5]['card_detail']->id}}">
                                            <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[5]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[5]['card_detail']->id}},{{$cardItems[5]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[5]['item']->id,['ci' => $cardItems[5],'template'=>200,'theme_shape'=>'theme2-shape'])
                                        </div>
                                    </div>
                                @else
                                    <div class="drop col-12 theme2-col theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[5]['card_detail']->id}}"  >
                                            @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[5]['card_detail']->id])
                                    </div> 
                                @endif
                            @endif
                            @if(isset($cardItems[6]))
                                @if(isset($cardItems[6]['item']))
                                    <div class="col-12 dashed theme2-padding theme2-col-sm" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[6]['card_detail']->id}}">
                                        <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[6]['card_detail']->id}}">
                                            <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[6]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[6]['card_detail']->id}},{{$cardItems[6]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[6]['item']->id,['ci' => $cardItems[6],'template'=>'100%','theme_shape'=>'theme2-shape'])
                                        </div>
                                    </div>
                                @else
                                        <div class="drop col-12  theme2-col-sm theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[6]['card_detail']->id}}"  >
                                                @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[6]['card_detail']->id])
                                        </div> 
                                @endif
                            @endif
                        </div>
                    </div>
                    @endif
                    @if(isset($cardItems[7]))
                        @if(isset($cardItems[7]['item']))
                            <div class="col-12 dashed theme2-padding theme2-col-sm" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[7]['card_detail']->id}}">
                                <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[7]['card_detail']->id}}">
                                    <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[7]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                    <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[7]['card_detail']->id}},{{$cardItems[7]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[7]['item']->id,['ci' => $cardItems[7],'template'=>95,'theme_shape'=>'theme2-shape'])
                                </div>
                            </div>
                        @else
                            <div class="drop col-12 theme2-col-sm  theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[7]['card_detail']->id}}"  >
                                @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[7]['card_detail']->id])
                            </div> 
                        @endif
                    @endif
                    @for ($i = 8; $i < count($cardItems); $i += 6)
                    @if(isset($cardItems[$i]))
                    <div class="col-6 theme-2" >
                        <div class="row theme-2">
                            @if(isset($cardItems[$i]))
                                @if(isset($cardItems[$i]['item']))
                                    <div class="col-12 dashed theme2-padding theme2-col-md" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[$i]['card_detail']->id}}">
                                        <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[$i]['card_detail']->id}}">
                                            <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[$i]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[$i]['card_detail']->id}},{{$cardItems[$i]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i]['item']->id,['ci' => $cardItems[$i],'template'=>180,'theme_shape'=>'theme2-shape'])
                                        </div>
                                    </div>
                                @else
                                    <div class="drop col-12  theme2-col-md theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[$i]['card_detail']->id}}"  >
                                            @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[$i]['card_detail']->id])
                                    </div> 
                                @endif
                            @endif
                            @if(isset($cardItems[$i+1]))
                                @if(isset($cardItems[$i+1]['item']))
                                    <div class="col-12 dashed theme2-padding theme2-col-md" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[$i+1]['card_detail']->id}}">
                                        <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[$i+1]['card_detail']->id}}">
                                            <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[$i+1]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[$i+1]['card_detail']->id}},{{$cardItems[$i+1]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+1]['item']->id,['ci' => $cardItems[$i+1],'template'=>180,'theme_shape'=>'theme2-shape'])
                                        </div>
                                    </div>
                                @else
                                    <div class="drop col-12  theme2-col-md theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[$i+1]['card_detail']->id}}"  >
                                            @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[$i+1]['card_detail']->id])
                                    </div> 
                                @endif
                            @endif
                        </div>
                    </div>
                    @endif
                    @if(isset($cardItems[$i+2]))
                        <div class="col-6 theme-2">
                        <div class="row theme-2">
                            @if(isset($cardItems[$i+2]))
                                @if(isset($cardItems[$i+2]['item']))
                                    <div class="col-12 dashed theme2-padding theme2-col-sm" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[$i+2]['card_detail']->id}}">
                                        <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[$i+2]['card_detail']->id}}">
                                            <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[$i+2]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[$i+2]['card_detail']->id}},{{$cardItems[$i+2]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+2]['item']->id,['ci' => $cardItems[$i+2],'template'=>'100%','theme_shape'=>'theme2-shape'])
                                        </div>
                                    </div>
                                @else
                                    <div class="drop col-12   theme2-col-sm theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[$i+2]['card_detail']->id}}"  >
                                            @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[$i+2]['card_detail']->id])
                                    </div> 
                                @endif
                            @endif
                            @if(isset($cardItems[$i+3]))
                                @if(isset($cardItems[$i+2]['item']))
                                    <div class="col-12 dashed theme2-padding theme2-col" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[$i+3]['card_detail']->id}}">
                                        <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[$i+3]['card_detail']->id}}">
                                            <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[$i+3]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[$i+3]['card_detail']->id}},{{$cardItems[$i+3]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+3]['item']->id,['ci' => $cardItems[$i+3],'template'=>200,'theme_shape'=>'theme2-shape'])
                                        </div>
                                    </div>
                                @else
                                    <div class="drop col-12  theme2-col theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[$i+3]['card_detail']->id}}"  >
                                            @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[$i+3]['card_detail']->id])
                                    </div> 
                                @endif
                            @endif
                            @if(isset($cardItems[$i+4]))
                                @if(isset($cardItems[$i+4]['item']))
                                    <div class="col-12 dashed theme2-padding theme2-col-sm" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[$i+4]['card_detail']->id}}">
                                        <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[$i+4]['card_detail']->id}}">
                                            <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[$i+4]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[$i+4]['card_detail']->id}},{{$cardItems[$i+4]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+4]['item']->id,['ci' => $cardItems[$i+4],'template'=>'100%','theme_shape'=>'theme2-shape'])
                                        </div>
                                    </div>
                                @else
                                    <div class="drop col-12  ttheme2-col-sm theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[$i+4]['card_detail']->id}}"  >
                                            @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[$i+4]['card_detail']->id])
                                    </div> 
                                @endif
                            @endif
                        </div>
                    </div>
                    @endif
                    @if(isset($cardItems[$i+5]))
                        @if(isset($cardItems[$i+5]['item']))
                            <div class="col-12 dashed theme2-padding theme2-col-sm" ondrop="dragAndDrop.drop(event)" ondragover="dragAndDrop.allowDrop(event)" id="drop{{$cardItems[$i+5]['card_detail']->id}}">
                                        <div class="drag" draggable="true" ondragstart="dragAndDrop.drag(event)"  id="drag{{$cardItems[$i+5]['card_detail']->id}}">
                                            <button class="btn btn-warning  btn-circle top-right btn-update" data-toggle="tooltip" title="Editar Keypl!" onclick="Cards.edit_detail({{$cardItems[$i+5]['card_detail']->id}})"><i class='fas fa-edit'></i></button>
                                            <button type="button" class="btn btn-danger btn-circle top-right btn-delete-item" style="display:none" onclick="Cards.delete_item({{$cardItems[$i+5]['card_detail']->id}},{{$cardItems[$i+5]['card_detail']->card_id}})" > <i class="fa fa-trash"></i></button>
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+5]['item']->id,['ci' => $cardItems[$i+5],'template'=>95,'theme_shape'=>'theme2-shape'])
                                        </div>
                            </div>
                        @else
                            <div class="drop col-12  ttheme2-col-sm theme{{$data['themes_id']}}-padding"  id="drop{{$cardItems[$i+5]['card_detail']->id}}"  >
                                    @include('Cards.itemsUpdate.itemsKeypl.defaultDiv',['id' => $cardItems[$i+5]['card_detail']->id])
                            </div> 
                        @endif
                    @endif
                    @endfor
            </div>

