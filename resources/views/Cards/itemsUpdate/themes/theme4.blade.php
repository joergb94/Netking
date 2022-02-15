
       <div class="row justify-content-between">
                @foreach($cardItems as $key => $ci)
                   
                     <div class="col-12" id="div-{{$ci['card_detail']->id}}">
                         @if($ci['item']->id == 5)
                            @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>$ci['card_detail']['item_data'],'theme_shape'=>'theme4-shape4 mx-auto d-block'])
                        @else
                        @include('Cards.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>250,'theme_shape'=>'theme4-shape4 mx-auto d-block'])
                        @endif
                    </div>
         
                @endforeach
            </div>