
       <div class="row justify-content-between">

                @foreach($cardItems as $key => $ci)
                   @if(isset($ci['item']))
                   @if($ci['item']->id == 8 || $ci['item']->id == 10)
                   <div class="col-12 theme4-col-10 theme4-padding" id="div-{{$ci['card_detail']->id}}">
                   @elseif($ci['item']->id == 2)
                   <div class="col-12 theme4-padding" id="div-{{$ci['card_detail']->id}}">
                   @else
                   <div class="col-12 theme4-col-12 theme4-padding" id="div-{{$ci['card_detail']->id}}">
                   @endif
                    
                         @if($ci['item']->id == 5)
                            @include('Keypls.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>$ci['card_detail']['item_data'],'theme_shape'=>'theme4-shape4 mx-auto d-block'])
                        @else
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>'100%','theme_shape'=>'theme4-shape4 mx-auto d-block'])
                        @endif
                    </div>
                    @endif
         
                @endforeach
            </div>