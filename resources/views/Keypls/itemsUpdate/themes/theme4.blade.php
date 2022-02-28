
       <div class="row justify-content-between">
                <div class="col-12 theme4-padding">
                        
                        <button type="button" class=" float-right btn {{$card_style['button_style'] == 0? 'keypl-btn ':'keypl-btn-full'}} btn-sm" value="{{$friend?1:0}}" id="btn-follow">
                           @if($friend) 
                                <span >following <i class="fas fa-user-check"></i></span>
                           @else
                                <span >follow <i class="fas fa-user-plus"></i></span>
                           @endif
                        </button>
                </div>
                @foreach($cardItems as $key => $ci)
                   
                     <div class="col-12" id="div-{{$ci['card_detail']->id}}">
                         @if($ci['item']->id == 5)
                            @include('Keypls.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>$ci['card_detail']['item_data'],'theme_shape'=>'theme4-shape4 mx-auto d-block'])
                        @else
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>250,'theme_shape'=>'theme4-shape4 mx-auto d-block'])
                        @endif
                    </div>
         
                @endforeach
            </div>