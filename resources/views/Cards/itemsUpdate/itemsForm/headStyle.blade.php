<div id="styleHead" class="tab-pane active col-12">
<div class="modal-header">
          <h4 class="modal-title">Hearder </h4>
</div>
<div class="form-group">
            <h3>Forma de imagen:</h3>
              <div class="col-sm-12">
                    <div class="col-sm-12 mx-auto d-block">
                      <div class="row">
                          <div class="col-sm-6">
                              <ul>
                                <li>
                                  <input type="checkbox" class="image-shapes shape1" onchange="Cards.save_asinc({{$data['id']}})"  value="1"  id="myCheckbox1" {!! $card_style['shape_image']  == 1?'checked disabled':''!!}/>
                                  <label for="myCheckbox1"><img class="rounded" src="{{asset('img/shape.jpg')}}" /></label>
                                </li>
                              </ul>
                          </div>
                          <div class="col-sm-6">
                            <ul>
                              <li>
                                <input type="checkbox" class="image-shapes shape0" onchange="Cards.save_asinc({{$data['id']}})" value="0" id="myCheckbox2" {!! $card_style['shape_image']  == 0?'checked disabled':''!!} />
                                <label for="myCheckbox2"><img class="rounded-circle" src="{{asset('img/shape.jpg')}}" /></label>
                              </li>
                            </ul>
                          </div>
                      </div>
                    </div>
                      <input type="hidden" name="shape_image" onchange="Cards.save_asinc({{$data['id']}})" id="shape_image"  value="{{$card_style['shape_image']}}">
              </div>
          </div>
          <div class="form-group">
            <h3>Orientation:</h3>
              <div class="col-sm-12">
                    <div class="col-sm-12 mx-auto d-block">
                      <div class="row">
                          <div class="col-sm-6">
                              <ul>
                                <li>
                                  <input type="checkbox" class="head_orientation orientation0"  value="0"  onchange="Cards.save_asinc({{$data['id']}})" id="myCheckbox3" {!! $card_style['head_orientation']  == 0?'checked disabled':''!!}/>
                                  <label for="myCheckbox3">
                                    <div class="col-12">
                                      <div class="row">
                                      <div class="col-12">
                                        <div class="col-12">
                                        <img class="rounded  mx-auto d-block image-form" src="{{asset('img/shape.jpg')}}" />
                                        </div>
                                      </div>
                                      <div class="col-12 text-center">
                                          <h4 class="d-none d-sm-block"><strong>________</strong></h4>
                                          <h4 class="d-none d-sm-block"><strong>________</strong></h4>
                                          <h4 class="d-block d-sm-none">Vertical</h4>
                                      </div>
                                      </div>
                                    </div>
                                  </label>
                                </li>
                              </ul>
                          </div>
                          <div class="col-sm-6">
                            <ul>
                              <li>
                                <input type="checkbox" class="head_orientation orientation1" onchange="Cards.save_asinc({{$data['id']}})" value="1" id="myCheckbox4" {!! $card_style['head_orientation']  == 1?'checked disabled':''!!} />
                                <label for="myCheckbox4">
                                  <div class="col-12">
                                    <br>
                                      <div class="row">
                                        <div class="col-12 col-sm-4">
                                          <div class="col-12">
                                            <img class="rounded image-form mx-auto d-block" src="{{asset('img/shape.jpg')}}" />
                                          </div>
                                        </div>
                                        <div class="col-12 col-sm-8">
                                          <h4 class="d-none d-sm-block"><strong>________</strong></h4>
                                          <h4 class="d-none d-sm-block"><strong>________</strong></h4>
                                          <h4 class="d-block d-sm-none">Horizontal</h4>
                                        </div>
                                      </div>
                                    <br>
                                  </div>
                                </label>
                              </li>
                            </ul>
                          </div>
                      </div>
                    </div>
                    <input type="hidden" id="head_orientation"  onchange="Cards.save_asinc({{$data['id']}})" name="head_orientation"  value="{{$card_style['head_orientation']}}">
              </div>
          </div>
</div>