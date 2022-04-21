<div id="styleBlocks" class="tab-pane fade col-12">
        <div class="modal-header">
          <h4 class="modal-title">Blocks </h4>
          @include('Cards.itemsUpdate.itemsForm.buttonDevice')
        </div>
        <div class="form-group">
            <h3>Forma de los Bloques:</h3>
              <div class="col-sm-12">

                <ul class="col-sm-12 mx-auto d-block list-group">
                              <li class="list-group-item col-12">
                                    <input type="checkbox" class="div-shapes shapeDiv0" onchange="Cards.save_asinc({{$data['id']}})"  value="0"  id="myCheckbox5" {!! $card_style['divs_shape']  == 0?'checked disabled':''!!}/>
                                    <label class="col-12" for="myCheckbox5">
                                      <div class="col-12 text-center bg-keypl text-dark size-q">
                                              <h6>Example keypls</h6>
                                      </div>
                                  </label>
                              </li>
                                <li class="list-group-item col-12">
                                  <input type="checkbox" class="div-shapes shapeDiv1" onchange="Cards.save_asinc({{$data['id']}})" value="1" id="myCheckbox6"  {!! $card_style['divs_shape']  == 1?'checked disabled':''!!}/>
                                  <label class="col-12" for="myCheckbox6">
                                      <div class="col-12 div-rounded text-center bg-keypl text-dark size-c">
                                            <h6>Example keypls</h6>
                                      </div>
                                  </label>
                                </li>

                            </ul>
                   
                            <input type="hidden" name="divs_shape" onchange="Cards.save_asinc({{$data['id']}})" id="div-shapes"  value="{{$card_style['divs_shape']}}">
              </div>
          </div>
</div>