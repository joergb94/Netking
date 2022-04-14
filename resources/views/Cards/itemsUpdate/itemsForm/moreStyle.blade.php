<div id="styleMore" class="tab-pane fade col-12">
<div class="modal-header">
          <h4 class="modal-title">More </h4>
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
          <div class="form-group" style="display:none">
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
</div>