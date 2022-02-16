
       <div class="row justify-content-between">
                @if(isset($cardItems[0]))
          
                    <div class="col-6 no-margin" id="div-{{$cardItems[0]['card_detail']->id}}">
                             @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[0]['item']->id,['ci' => $cardItems[0],'template'=>250,'theme_shape'=>'theme3-shape1 float-right'])
                    </div>
             
                @endif
                @if(isset($cardItems[1]))
                    <div class="col-6 no-margin" id="div-{{$cardItems[1]['card_detail']->id}}">
                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[1]['item']->id,['ci' => $cardItems[1],'template'=>250,'theme_shape'=>'theme3-shape1 float-left'])
            
                    </div>
                @endif
                @if(isset($cardItems[2]))
                <div class="col-6 no-margin" id="div-{{$cardItems[2]['card_detail']->id}}">
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[2]['item']->id,['ci' => $cardItems[2],'template'=>250,'theme_shape'=>'theme3-shape2 float-left'])
        
                </div>
                @endif
                @if(isset($cardItems[3]))
                <div class="col-6 no-margin" id="div-{{$cardItems[3]['card_detail']->id}}">
                    
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[3]['item']->id,['ci' => $cardItems[3],'template'=>250,'theme_shape'=>'theme3-shape1 float-right'])
                </div>
                @endif
                @if(isset($cardItems[4]))
                <div class="col-10 no-margin" id="div-{{$cardItems[4]['card_detail']->id}}">
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[4]['item']->id,['ci' => $cardItems[4],'template'=>250,'theme_shape'=>'theme3-shape3'])
                </div>
                @endif
                @if(isset($cardItems[5]))
                <div class="col-2" id="div-{{$cardItems[3]['card_detail']->id}}">
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[5]['item']->id,['ci' => $cardItems[5],'template'=>250,'theme_shape'=>'theme3-shape1'])
                </div>
                @endif
                <div class="col-12  no-margin">
                    <div class="row">
                        <div class="col-6  no-margin">
                            <div class="row">
                                @if(isset($cardItems[6]))
                                    <div class="col-12" id="div-{{$cardItems[6]['card_detail']->id}}">
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[6]['item']->id,['ci' => $cardItems[6],'template'=>250,'theme_shape'=>'theme3-shape4 float-right'])
                            
                                    </div>
                                @endif
                                @if(isset($cardItems[7]))
                                    <div class="col-12" id="div-{{$cardItems[7]['card_detail']->id}}">
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[7]['item']->id,['ci' => $cardItems[7],'template'=>250,'theme_shape'=>'theme3-shape4 float-left'])
                            
                                    </div>
                                @endif
                           </div>
                        </div>
                        <div class="col-6  no-margin">
                                @if(isset($cardItems[8]))
                                    <div class="col-12" id="div-{{$cardItems[2]['card_detail']->id}}">
                                            @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[8]['item']->id,['ci' => $cardItems[8],'template'=>250,'theme_shape'=>'theme3-shape2 float-left'])
                            
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                @foreach($cardItems as $key => $ci)
                    @if($key > 8)
                     <div class="col-12" id="div-{{$ci['card_detail']->id}}">
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>0,'theme_shape'=>'theme3-shape3 mx-auto d-block'])
                    </div>
                    @endif
                @endforeach
            </div>