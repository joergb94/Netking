

  
            <div class="row justify-content-between">
                    @if(isset($cardItems[0]))
                        <div class="col-12 theme2-padding theme-2" id="div-{{$cardItems[0]['card_detail']->id}}">
                          @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[0]['item']->id,['ci' => $cardItems[0],'template'=>200,'theme_shape'=>'theme2-shape'])
                        </div>
                    @endif
                    @if(isset($cardItems[1]))
                        <div class="col-12 theme2-padding-social theme-2" id="div-{{$cardItems[1]['card_detail']->id}}">
                             @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[1]['item']->id,['ci' => $cardItems[1],'template'=>200,'theme_shape'=>'theme2-shape'])
                        </div>
                    @endif
                    <div class="col-12 theme2-padding theme-2 text-center">
                        
                            <button type="button" class="mx-auto d-block btn {{$card_style['button_style'] == 0? 'keypl-btn ':'keypl-btn-full'}}  theme-2-btn-rounded" value="{{$friend?1:0}}" id="btn-follow">
                                @include('Keypls.itemsUpdate.themes.button')
                            </button>
                    </div> 
                    @if(isset($cardItems[2]))
                    <div class="col-6 theme-2" >
                        <div class="row theme-2">
                            @if(isset($cardItems[2]))
                                <div class="col-12 theme2-padding theme2-col-md" id="div-{{$cardItems[2]['card_detail']->id}}">
                                    @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[2]['item']->id,['ci' => $cardItems[2],'template'=>180,'theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                            @if(isset($cardItems[3]))
                                <div class="col-12 theme2-padding theme2-col-md" id="div-{{$cardItems[3]['card_detail']->id}}">
                                    @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[3]['item']->id,['ci' => $cardItems[3],'template'=>180,'theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    @if(isset($cardItems[4]))
                    <div class="col-6 theme-2">
                        <div class="row theme-2">
                            @if(isset($cardItems[4]))
                                <div class="col-12 theme2-padding theme2-col-sm" id="div-{{$cardItems[4]['card_detail']->id}}">
                                    @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[4]['item']->id,['ci' => $cardItems[4],'template'=>'100%','theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                            @if(isset($cardItems[5]))
                                <div class="col-12 theme2-padding theme2-col" id="div-{{$cardItems[5]['card_detail']->id}}">
                                    @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[5]['item']->id,['ci' => $cardItems[5],'template'=>200,'theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                            @if(isset($cardItems[6]))
                                <div class="col-12 theme2-padding theme2-col-sm" id="div-{{$cardItems[6]['card_detail']->id}}">
                                    @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[6]['item']->id,['ci' => $cardItems[6],'template'=>'100%','theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    @if(isset($cardItems[7]))
                        <div class="col-12 theme2-padding theme2-col-sm" id="div-{{$cardItems[7]['card_detail']->id}}">
                          @include('Keypls.itemsUpdate.itemsKeypl.div'.$cardItems[7]['item']->id,['ci' => $cardItems[7],'template'=>95,'theme_shape'=>'theme2-shape'])
                        </div>
                    @endif
                @foreach($cardItems as $key => $ci)
                    @if($key > 7)
                     <div class="col-6 theme2-col theme2-padding " id="div-{{$ci['card_detail']->id}}">
                        @include('Keypls.itemsUpdate.itemsKeypl.div'.$ci['item']->id,['ci' => $ci,'template'=>200,'theme_shape'=>'theme2-shape'])
                     </div>
                    @endif
                @endforeach
            </div>

