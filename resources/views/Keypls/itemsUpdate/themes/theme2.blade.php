

  
            <div class="row justify-content-between">
                @if(isset($cardItems[0]))
                    <div class="col-12 theme2-col" id="div-{{$cardItems[0]['card_detail']->id}}">
                            @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[0]['item']->id,['ci' => $cardItems[0],'template'=>250,'theme_shape'=>'theme2-shape'])
            
                    </div>
                @endif
                @if(isset($cardItems[1]))
                    <div class="col-6 theme2-col" id="div-{{$cardItems[1]['card_detail']->id}}">
                            @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[1]['item']->id,['ci' => $cardItems[1],'template'=>250,'theme_shape'=>'theme2-shape'])
            
                    </div>
                @endif
                @if(isset($cardItems[2]))
                    <div class="col-6 theme2-col" id="div-{{$cardItems[2]['card_detail']->id}}">
                            @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[2]['item']->id,['ci' => $cardItems[2],'template'=>250,'theme_shape'=>'theme2-shape'])
            
                    </div>
                @endif
                @foreach($cardItems as $key => $ci)
                    @if($key > 2)
                     <div class="col-12 theme2-col" id="div-{{$ci['card_detail']->id}}">
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>250,'theme_shape'=>'theme2-shape'])
                     </div>
                    @endif
                @endforeach
            </div>

