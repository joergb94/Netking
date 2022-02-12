
            <div class="row justify-content-between">
                @if(isset($cardItems[0]))
                <div class="col-12 theme1-col-12" id="div-{{$cardItems[0]['card_detail']->id}}">
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[0]['item']->id,['ci' => $cardItems[0],'template'=>250,'theme_shape'=>'theme1-shape'])
        
                </div>
                @endif
                @if(isset($cardItems[1]))
                <div class="col-12 theme1-col-12" id="div-{{$cardItems[1]['card_detail']->id}}">
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[1]['item']->id,['ci' => $cardItems[1],'template'=>250,'theme_shape'=>'theme1-shape'])
        
                </div>
                @endif
                @if(isset($cardItems[2]))
                <div class="col-6 theme1-col-6" id="div-{{$cardItems[2]['card_detail']->id}}">
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[2]['item']->id,['ci' => $cardItems[2],'template'=>250,'theme_shape'=>'theme1-shape'])
        
                </div>
                @endif
                
                <div class="col-6">
                    <div class="row">
                        @if(isset($cardItems[3]))
                        <div class="col-12 theme1-col" id="div-{{$cardItems[3]['card_detail']->id}}">
                                @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[3]['item']->id,['ci' => $cardItems[3],'template'=>'theme1-col','theme_shape'=>'theme1-shape'])
                
                        </div>
                        @endif
                        @if(isset($cardItems[4]))
                        <div class="col-12 theme1-col" id="div-{{$cardItems[4]['card_detail']->id}}">
                                @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[4]['item']->id,['ci' => $cardItems[4],'template'=>'theme1-col','theme_shape'=>'theme1-shape'])
                
                        </div>
                        @endif
                        @if(isset($cardItems[5]))
                        <div class="col-12 theme1-col" id="div-{{$cardItems[5]['card_detail']->id}}">
                                @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[5]['item']->id,['ci' => $cardItems[5],'template'=>'theme1-col','theme_shape'=>'theme1-shape'])
                
                        </div>
                        @endif
                     </div>
                </div>
                @foreach($cardItems as $key => $ci)
                    @if($key > 5)
                     <div class="col-12" id="div-{{$ci['card_detail']->id}}">
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>0,'theme_shape'=>'theme1-shape'])
                    </div>
                    @endif
                @endforeach
            </div>