<div class="col-sm-12" id='data-card'>
          <div class="form-group">
            <h3>Forma de imagen:</h3>
              <div class="col-sm-12">
                    <div class="col-sm-12 mx-auto d-block">
                      <div class="row">
                          <div class="col-sm-6">
                              <ul>
                                <li>
                                  <input type="checkbox" class="image-shapes shape1"  value="1"  id="myCheckbox1" {!! $card_style['shape_image']  == 1?'checked disabled':''!!}/>
                                  <label for="myCheckbox1"><img class="rounded" src="{{asset('img/shape.jpg')}}" /></label>
                                </li>
                              </ul>
                          </div>
                          <div class="col-sm-6">
                            <ul>
                              <li>
                                <input type="checkbox" class="image-shapes shape0"  value="0" id="myCheckbox2" {!! $card_style['shape_image']  == 0?'checked disabled':''!!} />
                                <label for="myCheckbox2"><img class="rounded-circle" src="{{asset('img/shape.jpg')}}" /></label>
                              </li>
                            </ul>
                          </div>
                      </div>
                    </div>
                      <input type="hidden" name="shape_image" onchange="Cards.prev()" id="shape_image"  value="{{$card_style['shape_image']}}">
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
                                  <input type="checkbox" class="head_orientation orientation0"  value="0"  id="myCheckbox3" {!! $card_style['head_orientation']  == 0?'checked disabled':''!!}/>
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
                                <input type="checkbox" class="head_orientation orientation1"  value="1" id="myCheckbox4" {!! $card_style['head_orientation']  == 1?'checked disabled':''!!} />
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
                    <input type="hidden" id="head_orientation"  onchange="Cards.prev()" name="head_orientation"  value="{{$card_style['head_orientation']}}">
              </div>
          </div>
          <div class="form-group">
            <label>Image Profile:</label>
              <input type="file" class="form-control-file border" id="image" name="image">
          </div>
          <div class="form-group">
            <label>Title:</label>
            <input type="text" onchange="Cards.prev()" id="title" name="title" value="{{isset($data['title'])?$data['title']:''}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Subtitle:</label>
            <input type="text" onchange="Cards.prev()" id="subtitle" name="subtitle" value="{{isset($data['subtitle'])?$data['subtitle']:''}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Theme:</label>
            <input type="text" onchange="Cards.prev()" id="theme" name="theme" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>Backgroud:</label>
            <select name="background" id="background" onchange="Cards.prev()" class="form-control">
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
            <label>Backgroud:</label>
            <div class="custom-control custom-checkbox">
                <select  id="largeTitle" onchange="Cards.prev()" name="large_text" class="form-control">
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
          <div class="form-group">
            <label>Color Text:</label>
            <input onchange="Cards.prev()"  type="text" id="colorInput" name='color' data-jscolor="" class="form-control" value="{{(isset($data['color']))?$data['color']:''}}">
          </div>
          <div class="form-group">
            <select onchange="Cards.prev()" name="text_style" id="text_style" class="form-control">
              @forelse ($text_styles as $text_style)
                  <option value="{{$text_style['id']}}">{{$text_style['name']}}</option>
              @empty
                  <option value="">No style</option>
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label>Location:</label>
            <input type="text" id="ocation" onchange="Cards.prev()" name="location" value="{{(isset($data['location']))?$data['location']:''}}" class="form-control">
          </div>
 </div>       
<script>
    var myPicker = new JSColor('#colorInput', {format:'hex'});

     $('.image-shapes').click(function(){
         let shape = $(this).val();
         
        let checDisabled1 = document.getElementById("myCheckbox1")
                              checDisabled1.disabled = shape == 1 ?true:false;

        let checDisabled2 = document.getElementById("myCheckbox2")
                              checDisabled2.disabled = shape == 0 ?true:false;

        $('#shape_image').val(shape);

        $(".image-shapes").prop("checked", false);
        $(".shape"+shape).prop("checked", true);

        Cards.prev();
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

        Cards.prev();
     });
</script>