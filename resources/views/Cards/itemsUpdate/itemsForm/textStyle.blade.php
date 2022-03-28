<div id="styleText" class="tab-pane fade">
<div class="modal-header">
          <h4 class="modal-title">Text </h4>
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
</div>