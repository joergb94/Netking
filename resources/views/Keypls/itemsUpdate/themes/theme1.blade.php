
            <div class="row justify-content-between">
                @if(isset($cardItems[0]))
                <div class="col-12 theme{{$data['themes_id']}}-padding" id="div-{{$cardItems[0]['card_detail']->id}}">
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[0]['item']->id,['ci' => $cardItems[0],'template'=>250,'theme_shape'=>'theme1-shape'])
        
                </div>
                @endif
                @if(isset($cardItems[1]))
                <div class="col-12 theme{{$data['themes_id']}}-padding" id="div-{{$cardItems[1]['card_detail']->id}}">
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[1]['item']->id,['ci' => $cardItems[1],'template'=>250,'theme_shape'=>'theme1-shape'])
        
                </div>
                @endif
                @if(isset($cardItems[2]))
                <div class="col-6 theme1-col-6 theme{{$data['themes_id']}}-padding" id="div-{{$cardItems[2]['card_detail']->id}}">
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[2]['item']->id,['ci' => $cardItems[2],'template'=>305,'theme_shape'=>'theme1-shape'])
                </div>
                @endif
                <div class="col-6 theme1-col-6">
                    <div class="row">
                        @if(isset($cardItems[3]))
                        <div class="col-12 theme1-col-social theme{{$data['themes_id']}}-padding" id="div-{{$cardItems[3]['card_detail']->id}}">
                                @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[3]['item']->id,['ci' => $cardItems[3],'template'=>'143','theme_shape'=>'theme1-shape'])
                
                        </div>
                        @endif
                        @if(isset($cardItems[4]))
                        <div class="col-12 theme1-col theme{{$data['themes_id']}}-padding" id="div-{{$cardItems[4]['card_detail']->id}}">
                                @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[4]['item']->id,['ci' => $cardItems[4],'template'=>'143','theme_shape'=>'theme1-shape'])
                
                        </div>
                        @endif
                        @if(isset($cardItems[5]))
                        <div class="col-12 theme1-col theme{{$data['themes_id']}}-padding" id="div-{{$cardItems[5]['card_detail']->id}}">
                                @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[5]['item']->id,['ci' => $cardItems[5],'template'=>'143','theme_shape'=>'theme1-shape'])
                
                        </div>
                        @endif
                     </div>
                </div>
                @for ($i = 6; $i < count($cardItems); $i += 4)
                        @if(isset($cardItems[$i]))
                        <div class="col-6 theme1-col-6 theme{{$data['themes_id']}}-padding" id="div-{{$cardItems[$i]['card_detail']->id}}">
                                @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[$i]['item']->id,['ci' => $cardItems[$i],'template'=>305,'theme_shape'=>'theme1-shape'])
                        </div>
                        @endif
                        <div class="col-6 theme1-col-6">
                        <div class="row">
                                @if(isset($cardItems[$i+1]))
                                <div class="col-12 theme1-col theme{{$data['themes_id']}}-padding" id="div-{{$cardItems[$i+1]['card_detail']->id}}">
                                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[$i+1]['item']->id,['ci' => $cardItems[$i+1],'template'=>'100','theme_shape'=>'theme1-shape'])
                                </div>
                                @endif
                                @if(isset($cardItems[$i+2]))
                                <div class="col-12 theme1-col theme{{$data['themes_id']}}-padding" id="div-{{$cardItems[$i+2]['card_detail']->id}}">
                                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[$i+2]['item']->id,['ci' => $cardItems[$i+2],'template'=>'100','theme_shape'=>'theme1-shape'])
                        
                                </div>
                                @endif
                                @if(isset($cardItems[$i+3]))
                                <div class="col-12 theme1-col theme{{$data['themes_id']}}-padding" id="div-{{$cardItems[$i+3]['card_detail']->id}}">
                                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[$i+3]['item']->id,['ci' => $cardItems[$i+3],'template'=>'100','theme_shape'=>'theme1-shape'])
                        
                                </div>
                                @endif
                        </div>
                        </div>
                @endfor
            </div>