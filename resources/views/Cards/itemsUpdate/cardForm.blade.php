<div class="col-sm-12" id='data-card'>
  <form id="card-form-style" >
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
          <div class="form-group">
            <h3>Forma de los Bloques:</h3>
              <div class="col-sm-12">

                <ul class="col-sm-12 mx-auto d-block list-group">
                              <li class="list-group-item col-12">
                                    <input type="checkbox" class="div-shapes shapeDiv0" onchange="Cards.save_asinc({{$data['id']}})"  value="0"  id="myCheckbox5" {!! $card_style['divs_shape']  == 0?'checked disabled':''!!}/>
                                    <label class="col-12" for="myCheckbox5">
                                      <div class="col-12 text-center bg-secondary text-dark size-q">
                                              <h6>Example keypls</h6>
                                      </div>
                                  </label>
                              </li>
                                <li class="list-group-item col-12">
                                  <input type="checkbox" class="div-shapes shapeDiv1" onchange="Cards.save_asinc({{$data['id']}})" value="1" id="myCheckbox6"  {!! $card_style['divs_shape']  == 1?'checked disabled':''!!}/>
                                  <label class="col-12" for="myCheckbox6">
                                      <div class="col-12 div-rounded text-center bg-secondary text-dark size-c">
                                            <h6>Example keypls</h6>
                                      </div>
                                  </label>
                                </li>

                            </ul>
                   
                            <input type="hidden" name="divs_shape" onchange="Cards.save_asinc({{$data['id']}})" id="div-shapes"  value="{{$card_style['divs_shape']}}">
              </div>
          </div>
          <div class="form-group">
            <h3>Forma de los Botones:</h3>
              <div class="col-sm-12">
                <div class="row">
                            <div class="col-sm-4" hidden>
                                <ul>
                                  <li>
                                    <input type="checkbox" class="buttons_shape shapeButton1" onchange="Cards.save_asinc({{$data['id']}})" value="1" id="myCheckbox7"  {!! $card_style['buttons_shape']  == 1?'checked disabled':''!!} />
                                    <label for="myCheckbox7"><button type="button" class="btn btn-fab-r bg-secondary text-dark text-center">Basic</button></label>
                                  </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                              <ul>
                                <li>
                                  <input type="checkbox" class="buttons_shape shapeButton2" onchange="Cards.save_asinc({{$data['id']}})" value="2" id="myCheckbox8"  {!! $card_style['buttons_shape']  == 2?'checked disabled':''!!} />
                                  <label for="myCheckbox8"><button type="button" class="btn btn-rounded btn-block bg-secondary text-dark">Basic</button></label>
                                </li>
                              </ul>
                            </div>
                            <div class="col-sm-6">
                              <ul>
                                  <li>
                                    <input type="checkbox" class="buttons_shape shapeButton3" onchange="Cards.save_asinc({{$data['id']}})"  value="3"  id="myCheckbox9" {!! $card_style['buttons_shape']  == 3?'checked disabled':''!!} />
                                    <label for="myCheckbox9"><button type="button" class="btn bg-secondary btn-block text-dark" >Basic</button></label>
                                  </li>
                              </ul>
                            </div>
                </div>
                      <input type="hidden" name="buttons_shape" onchange="Cards.save_asinc({{$data['id']}})" id="buttons_shape"  value="{{$card_style['buttons_shape']}}">
              </div>
          </div>
          <div class="form-group">
     
                  <label>Color Text:</label>
                  <input onchange="Cards.save_asinc({{$data['id']}})"  type="text" id="colorInput" name='color' data-jscolor="" class="form-control" value="{{(isset($data['color']))?$data['color']:''}}">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label>Size Text Header:</label>
                <div class="custom-control custom-checkbox">
                    <select  id="largeTitle" onchange="Cards.save_asinc({{$data['id']}})" name="large_text" class="form-control">
                      @if (isset($data))
                        @if ($data['large_text'] == 1)
                        <option value="0">Medium</option>
                        <option value="1" selected>Big</option>
                        @else
                        <option value="0" selected>Medium</option>
                        <option value="1">Big</option>
                        @endif
                        @else
                        <option value="0" selected>Medium</option>
                        <option value="1">Big</option>
                        @endif
                      
                    </select>
                </div>
              </div>
              <div class="col-sm-6">
                <label>Text Style:</label>
                <select onchange="Cards.save_asinc({{$data['id']}})" name="text_style_id" id="text_style" class="form-control">
                  @forelse ($text_styles as $text_style)
                      <option value="{{$text_style['id']}}">{{$text_style['name']}}</option>
                  @empty
                      <option value="">No style</option>
                  @endforelse
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Theme:</label>
            <select  id="theme" name="theme" onchange="Cards.save_asinc_theme({{$data['id']}})" class="form-control">
              @forelse ($themes as $theme)
                  @if (isset($data['themes_id']))
                      @if ($theme['id'] == $data['themes_id'])
                      <option value="{{$theme['id']}}" selected>{{$theme['name']}}</option>
                      @else
                      <option value="{{$theme['id']}}">{{$theme['name']}}</option>
                      @endif
                  @else
                  <option value="{{$theme['id']}}">{{$theme['name']}}</option>
                  @endif
              @empty
                 <option value="">No data</option> 
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label>Backgroud:</label>
            <select name="background" id="background" onchange="Cards.save_asinc({{$data['id']}})" class="form-control">
              @forelse ($backgrounds as $item)
                  @if (isset($data['background_image_id']))
                      @if ($item['id'] == $data['background_image_id'])
                      <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                      @else
                      <option value="{{$item['id']}}">{{$item['name']}}</option>
                      @endif
                  @else
                  <option value="{{$item['id']}}">{{$item['name']}}</option>
                  @endif
              @empty
                 <option value="">No data</option> 
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label>Location:</label>
            <input type="text" id="ocation" onchange="Cards.save_asinc({{$data['id']}})" name="location" value="{{(isset($data['location']))?$data['location']:''}}" class="form-control">
          </div>
  </form>
  <script>
    var myPicker = new JSColor('#colorInput', {format:'hex'});
    var myPicker2 = new JSColor('#background_image_color', {format:'hex'});

     $('.image-shapes').click(function(){
         let shape = $(this).val();
         
        let checDisabled1 = document.getElementById("myCheckbox1")
                              checDisabled1.disabled = shape == 1 ?true:false;

        let checDisabled2 = document.getElementById("myCheckbox2")
                              checDisabled2.disabled = shape == 0 ?true:false;

        $('#shape_image').val(shape);

        $(".image-shapes").prop("checked", false);
        $(".shape"+shape).prop("checked", true);
     });

     $('.head_orientation').click(function(){
         let orientation = $(this).val();

         let checDisabled3 = document.getElementById("myCheckbox3")
                              checDisabled3.disabled = orientation == 0 ?true:false;

        let checDisabled4 = document.getElementById("myCheckbox4")
                              checDisabled4.disabled = orientation == 1 ?true:false;
                            
                                    

        $('#head_orientation').val(orientation);

        $(".head_orientation").prop("checked", false);
        $(".orientation"+orientation).prop("checked", true);
     
     });

     $('.div-shapes').click(function(){
         let divs = $(this).val();

         let checDisabled5 = document.getElementById("myCheckbox5")
                              checDisabled5.disabled = divs == 0 ?true:false;

        let checDisabled6 = document.getElementById("myCheckbox6")
                              checDisabled6.disabled = divs == 1 ?true:false;
                            
                                    

        $('#div-shapes').val(divs);

        $(".div-shapes").prop("checked", false);
        $(".shapeDiv"+divs).prop("checked", true);
     
     });
      
     $('.buttons_shape').click(function(){
         let buttons = $(this).val();
        console.log(buttons);  

        $('#buttons_shape').val(buttons);
        $(".buttons_shape").prop("checked", false);
        $(".buttons_shape").prop("disabled", false);
 
        $(".shapeButton"+buttons).prop("checked", true);
        $(".shapeButton"+buttons).prop("disabled", true);
     
     });

     $('.type-background').click(function(){
         let buttons = $(this).val();
        console.log(buttons);  

        $('#type-background').val(buttons);
        $(".type-background").prop("checked", false);
        $(".type-background").prop("disabled", false);
 
        $(".background"+buttons).prop("checked", true);
        $(".background"+buttons).prop("disabled", true);
        $(".background-forms").hide();
        $(".background-form"+buttons).show();
        
     
     });
      
</script>
 </div>       
