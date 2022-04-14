<div id="styleBackground" class="tab-pane fade col-12">
        <div class="modal-header">
          <h4 class="modal-title">Backgroud </h4>
        </div>
        <div class="form-group">
            <h3>Fondo del Keypl:</h3>
              <div class="col-sm-12">
                    <div class="col-sm-12 mx-auto d-block">
                      <div class="row">
                          <div class="col-sm-6">
                              <ul>
                                <li>
                                  <input type="checkbox" class="type-background background0" onchange="Cards.save_asinc({{$data['id']}})"  value="0"  id="myCheckbox11" {!! $card_style['background_color'] == 0?'checked disabled':''!!}/>
                                  <label for="myCheckbox11">
                                      <h1><i style="font-size: 100px;" class="fa fa-image"></i></h1>
                                    </label>
                                </li>
                              </ul>
                          </div>
                          <div class="col-sm-6">
                            <ul>
                              <li>
                                <input type="checkbox" class="type-background background1" onchange="Cards.save_asinc({{$data['id']}})" value="1" id="myCheckbox12" {!! $card_style['background_color']  == 1?'checked disabled':''!!} />
                                <label for="myCheckbox12"><i style="font-size: 100px;" class="fas fa-brush"></i></label>
                              </li>
                            </ul>
                          </div>
                      </div>
                    </div>
                      <input type="hidden" name="background_color" onchange="Cards.save_asinc({{$data['id']}})" id="type-background"  value="{{$card_style['background_color']}}">
              </div>
          </div>
          <div class="form-group background-forms background-form1" @if($card_style['background_color'] == 0) style="display:none" @endif>
                  <label>Backgroud Color:</label>
                  <input onchange="Cards.save_asinc({{$data['id']}})"  type="text" id="background_image_color" name='background_image_color' data-jscolor="" class="form-control" value="{{(isset($data['background_image_color']))?$data['background_image_color']:''}}">
                  <br>
          </div>
          <div class="form-group background-forms background-form0" @if($card_style['background_color'] == 1) style="display:none" @endif>
            <label>Cargar Imagen:</label>
              <input type="file" onchange="Cards.save_asinc({{$data['id']}})" class="form-control-file border" id="image" name="image">
            <br>
        </div>
</div>