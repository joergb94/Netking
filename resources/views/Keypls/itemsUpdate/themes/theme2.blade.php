

  
            <div class="row justify-content-between">
                @if(isset($cardItems[0]))
                    <div class="col-12" id="div-{{$cardItems[0]['card_detail']->id}}">
                            @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[0]['item']->id,['ci' => $cardItems[0],'template'=>250,'theme_shape'=>'theme2-shape'])
            
                    </div>
                @endif
                @foreach($cardItems as $key => $ci)
                    @if($key > 0)
                     <div class="col-4 theme2-col theme2-padding" id="div-{{$ci['card_detail']->id}}">
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>250,'theme_shape'=>'theme2-shape'])
                     </div>
                    @endif
                @endforeach
            </div>

