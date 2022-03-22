

  
            <div class="row justify-content-between">
                    @if(isset($cardItems[0]))
                        <div class="col-12 theme2-padding theme-2" id="div-{{$cardItems[0]['card_detail']->id}}">
                          @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[0]['item']->id,['ci' => $cardItems[0],'template'=>200,'theme_shape'=>'theme2-shape'])
                        </div>
                    @endif
                    @if(isset($cardItems[1]))
                        <div class="col-12 theme2-padding-social theme-2" id="div-{{$cardItems[1]['card_detail']->id}}">
                             @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[1]['item']->id,['ci' => $cardItems[1],'template'=>200,'theme_shape'=>'theme2-shape'])
                        </div>
                    @endif
                    @if(isset($cardItems[2]))
                    <div class="col-6 theme-2" >
                        <div class="row theme-2">
                            @if(isset($cardItems[2]))
                                <div class="col-12 theme2-padding theme2-col-md" id="div-{{$cardItems[2]['card_detail']->id}}">
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[2]['item']->id,['ci' => $cardItems[2],'template'=>180,'theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                            @if(isset($cardItems[3]))
                                <div class="col-12 theme2-padding theme2-col-md" id="div-{{$cardItems[3]['card_detail']->id}}">
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[3]['item']->id,['ci' => $cardItems[3],'template'=>180,'theme_shape'=>'theme2-shape'])
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
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[4]['item']->id,['ci' => $cardItems[4],'template'=>'100%','theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                            @if(isset($cardItems[5]))
                                <div class="col-12 theme2-padding theme2-col" id="div-{{$cardItems[5]['card_detail']->id}}">
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[5]['item']->id,['ci' => $cardItems[5],'template'=>200,'theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                            @if(isset($cardItems[6]))
                                <div class="col-12 theme2-padding theme2-col-sm" id="div-{{$cardItems[6]['card_detail']->id}}">
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[6]['item']->id,['ci' => $cardItems[6],'template'=>'100%','theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    @if(isset($cardItems[7]))
                        <div class="col-12 theme2-padding theme2-col-sm" id="div-{{$cardItems[7]['card_detail']->id}}">
                          @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[7]['item']->id,['ci' => $cardItems[7],'template'=>95,'theme_shape'=>'theme2-shape'])
                        </div>
                    @endif
                    @for ($i = 8; $i < count($cardItems); $i += 6)
                    @if(isset($cardItems[$i]))
                    <div class="col-6 theme-2" >
                        <div class="row theme-2">
                            @if(isset($cardItems[$i]))
                                <div class="col-12 theme2-padding theme2-col-md" id="div-{{$cardItems[$i]['card_detail']->id}}">
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i]['item']->id,['ci' => $cardItems[$i],'template'=>180,'theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                            @if(isset($cardItems[$i+1]))
                                <div class="col-12 theme2-padding theme2-col-md" id="div-{{$cardItems[$i+1]['card_detail']->id}}">
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+1]['item']->id,['ci' => $cardItems[$i+1],'template'=>180,'theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    @if(isset($cardItems[$i+2]))
                        <div class="col-6 theme-2">
                        <div class="row theme-2">
                            @if(isset($cardItems[$i+2]))
                                <div class="col-12 theme2-padding theme2-col-sm" id="div-{{$cardItems[$i+2]['card_detail']->id}}">
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+2]['item']->id,['ci' => $cardItems[$i+2],'template'=>'100%','theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                            @if(isset($cardItems[$i+3]))
                                <div class="col-12 theme2-padding theme2-col" id="div-{{$cardItems[$i+3]['card_detail']->id}}">
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+3]['item']->id,['ci' => $cardItems[$i+3],'template'=>200,'theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                            @if(isset($cardItems[$i+4]))
                                <div class="col-12 theme2-padding theme2-col-sm" id="div-{{$cardItems[$i+4]['card_detail']->id}}">
                                    @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+4]['item']->id,['ci' => $cardItems[$i+4],'template'=>'100%','theme_shape'=>'theme2-shape'])
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    @if(isset($cardItems[$i+5]))
                        <div class="col-12 theme2-padding theme2-col-sm" id="div-{{$cardItems[$i+5]['card_detail']->id}}">
                          @include('Cards.itemsUpdate.itemsKeypl.div'.$cardItems[$i+5]['item']->id,['ci' => $cardItems[$i+5],'template'=>95,'theme_shape'=>'theme2-shape'])
                        </div>
                    @endif
                    @endfor
            </div>

