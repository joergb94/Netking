
       <div class="row justify-content-between">
                  <div class="col-12 theme{{$data['themes_id']}}-padding text-center">
                        
                        <button type="button" class="mx-auto d-block btn {{$card_style['button_style'] == 0? 'keypl-btn ':'keypl-btn-full'}} btn-sm" value="{{$friend?1:0}}" id="btn-follow">
                            @include('Keypls.itemsUpdate.themes.button')
                        </button>
                </div>
                @if(isset($cardItems[0]))
          
                    <div class="col-6 no-margin" id="div-{{$cardItems[0]['card_detail']->id}}">
                             @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[0]['item']->id,['ci' => $cardItems[0],'template'=>250,'theme_shape'=>'theme3-shape1 float-right'])
                    </div>
             
                @endif
                @if(isset($cardItems[1]))
                    <div class="col-6 no-margin" id="div-{{$cardItems[1]['card_detail']->id}}">
                            @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[1]['item']->id,['ci' => $cardItems[1],'template'=>250,'theme_shape'=>'theme3-shape1 float-left'])
            
                    </div>
                @endif
                @if(isset($cardItems[2]))
                <div class="col-6 no-margin" id="div-{{$cardItems[2]['card_detail']->id}}">
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[2]['item']->id,['ci' => $cardItems[2],'template'=>250,'theme_shape'=>'theme3-shape2 float-left'])
        
                </div>
                @endif
                @if(isset($cardItems[3]))
                <div class="col-6 no-margin" id="div-{{$cardItems[3]['card_detail']->id}}">
                    
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[3]['item']->id,['ci' => $cardItems[3],'template'=>250,'theme_shape'=>'theme3-shape1 float-right'])
                </div>
                @endif
                @if(isset($cardItems[4]))
                <div class="col-10 no-margin" id="div-{{$cardItems[4]['card_detail']->id}}">
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[4]['item']->id,['ci' => $cardItems[4],'template'=>250,'theme_shape'=>'theme3-shape3'])
        
                </div>
                @endif
                @if(isset($cardItems[5]))
                <div class="col-2" id="div-{{$cardItems[3]['card_detail']->id}}">
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[5]['item']->id,['ci' => $cardItems[5],'template'=>250,'theme_shape'=>'theme3-shape1'])
                </div>
                @endif
                <div class="col-12 theme{{$data['themes_id']}}-padding">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                @if(isset($cardItems[6]))
                                    <div class="col-12" id="div-{{$cardItems[6]['card_detail']->id}}">
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[6]['item']->id,['ci' => $cardItems[6],'template'=>250,'theme_shape'=>'theme3-shape4 float-left'])
                            
                                    </div>
                                @endif
                                @if(isset($cardItems[7]))
                                    <div class="col-12" id="div-{{$cardItems[7]['card_detail']->id}}">
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[7]['item']->id,['ci' => $cardItems[7],'template'=>250,'theme_shape'=>'theme3-shape4 float-right'])
                            
                                    </div>
                                @endif
                           </div>
                        </div>
                        <div class="col-6  no-margin theme{{$data['themes_id']}}-padding">
                                @if(isset($cardItems[8]))
                                    <div class="col-12" id="div-{{$cardItems[8]['card_detail']->id}}">
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[8]['item']->id,['ci' => $cardItems[8],'template'=>250,'theme_shape'=>'theme3-shape2 float-left'])
                            
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                @for ($i = 9; $i < count($cardItems); $i += 4)
                <div class="col-12 theme{{$data['themes_id']}}-padding" id="div-{{$cardItems[$i]['card_detail']->id}}">
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i]['item']->id,['ci' => $cardItems[$i],'template'=>0,'theme_shape'=>'theme3-shape3 mx-auto d-block'])
                </div>
                <div class="col-12 theme{{$data['themes_id']}}-padding">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                @if(isset($cardItems[$i+1]))
                                    <div class="col-12" id="div-{{$cardItems[$i+1]['card_detail']->id}}">
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+1]['item']->id,['ci' => $cardItems[$i+1],'template'=>250,'theme_shape'=>'theme3-shape4 float-left'])
                            
                                    </div>
                                @endif
                                @if(isset($cardItems[$i+2]))
                                    <div class="col-12" id="div-{{$cardItems[$i+2]['card_detail']->id}}">
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+2]['item']->id,['ci' => $cardItems[$i+2],'template'=>250,'theme_shape'=>'theme3-shape4 float-right'])
                            
                                    </div>
                                @endif
                           </div>
                        </div>
                        <div class="col-6  no-margin theme{{$data['themes_id']}}-padding">
                                @if(isset($cardItems[$i+3]))
                                    <div class="col-12" id="div-{{$cardItems[2]['card_detail']->id}}">
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+3]['item']->id,['ci' => $cardItems[$i+3],'template'=>250,'theme_shape'=>'theme3-shape2 float-left'])
                            
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                @endfor
            </div>