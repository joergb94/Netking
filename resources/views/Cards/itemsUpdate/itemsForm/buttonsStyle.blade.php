<div id="styleButtons" class="tab-pane fade col-12">
<div class="modal-header">
          <h4 class="modal-title">Buttons </h4>
</div>
<div class="form-group">
            <h3>Forma de los Botones:</h3>
              <div class="col-sm-12">
                <div class="row">
                            <div class="col-sm-6">
                              <ul>
                                <li>
                                  <input type="checkbox" class="buttons_shape shapeButton2" onchange="Cards.save_asinc({{$data['id']}})" value="2" id="myCheckbox8"  {!! $card_style['buttons_shape']  == 2?'checked disabled':''!!} />
                                  <label for="myCheckbox8"><button  type="button" class="btn btn-rounded btn-block bg-keypl text-dark button-form-size">Basic</button></label>
                                </li>
                              </ul>
                            </div>
                            <div class="col-sm-6">
                              <ul>
                                  <li>
                                    <input type="checkbox" class="buttons_shape shapeButton3" onchange="Cards.save_asinc({{$data['id']}})"  value="3"  id="myCheckbox9" {!! $card_style['buttons_shape']  == 3?'checked disabled':''!!} />
                                    <label for="myCheckbox9"><button type="button" class="btn bg-keypl btn-block text-dark button-form-size" >Basic</button></label>
                                  </li>
                              </ul>
                            </div>
                </div>
                      <input type="hidden" name="buttons_shape" onchange="Cards.save_asinc({{$data['id']}})" id="buttons_shape"  value="{{$card_style['buttons_shape']}}">
              </div>
          </div>
          <div class="form-group">
            <h3>Estilo de los Botones:</h3>
              <div class="col-sm-12">
                <div class="row">
                            <div class="col-sm-6">
                              <ul>
                                <li>
                                  <input type="checkbox" class="button_style button_style0" onchange="Cards.save_asinc({{$data['id']}})" value="0" id="myCheckbox13"  {!! $card_style['button_style']  == 0?'checked disabled':''!!} />
                                  <label for="myCheckbox13"><i style="font-size: 100px;" class="fas fa-border-all"></i></label>
                                </li>
                              </ul>
                            </div>
                            <div class="col-sm-6">
                              <ul>
                                  <li>
                                    <input type="checkbox" class="button_style button_style1" onchange="Cards.save_asinc({{$data['id']}})"  value="1"  id="myCheckbox14" {!! $card_style['button_style']  == 1?'checked disabled':''!!} />
                                    <label for="myCheckbox14"><i style="font-size: 100px;" class="fas fa-square"></i></label>
                                  </li>
                              </ul>
                            </div>
                </div>
                      <input type="hidden" name="button_style" onchange="Cards.save_asinc({{$data['id']}})" id="button_style"  value="{{$card_style['button_style']}}">
              </div>
          </div>
</div>