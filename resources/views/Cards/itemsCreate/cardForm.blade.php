 <div class="col-sm-12" id='data-card'>
          <div class="form-group">
            <label>Title:</label>
            <input type="text" id="title" name="title" value="@if(isset($data['title'])){{$data['title']}}@endif" class="form-control">
          </div>
          <div class="form-group">
            <label>Subtitle:</label>
            <input type="text" id="subtitle" name="subtitle" value="@if(isset($data['subtitle'])){{$data['subtitle']}}@endif" class="form-control">
          </div>
          <div class="form-group">
            <label>Theme:</label>
            <input type="text" id="theme" name="theme" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>Backgroud:</label>
            <select name="background" id="background" class="form-control">
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
          </div><div class="form-group">
            <label>Location:</label>
            <input type="text" id="ocation" name="location" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>Large Text:</label>
            <input type="text" id="large_text" name="large_text" value="@if(isset($data['large_text'])){{$data['large_text']}}@endif" class="form-control">
          </div>
 </div>       
          