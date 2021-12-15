 <div class="col-sm-12" id='data-card'>
          <div class="form-group">
            <label>Image Profile:</label>
              <div class="input-group mb-3">
                <input type="file" class="form-control">
                <div class="input-group-append">
                  <select class="form-control max-height" id="shape_image"  onchange="Cards.prev()" name="shape_image">
                    <option value="0">Square</option>
                    <option value="1" >Rounded</option>
                  </select>
                </div>
            </div> 
          </div>
          <div class="form-group">
            <label>Title:</label>
            <input type="text" onchange="Cards.prev()" id="title" name="title" value="@if(isset($data['title'])){{$data['title']}}@endif" class="form-control">
          </div>
          <div class="form-group">
            <label>Subtitle:</label>
            <input type="text" onchange="Cards.prev()" id="subtitle" name="subtitle" value="@if(isset($data['subtitle'])){{$data['subtitle']}}@endif" class="form-control">
          </div>
          <div class="form-group">
            <label>Orientation:</label>
            <select class="form-control" id="head_orientation"  onchange="Cards.prev()" name="head_orientation">
                    <option value="0">Vertical</option>
                    <option value="1" >Horizontal</option>
            </select>
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
                  <option value="0" selected>Medium</option>
                  <option value="1">Big</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label>Color Text:</label>
            <input onchange="Cards.prev()"  type="text" id="colorInput" name='color' data-jscolor="" class="form-control">
          </div>
          <div class="form-group">
            <label>Location:</label>
            <input type="text" id="ocation" onchange="Cards.prev()" name="location" value="" class="form-control">
          </div>
 </div>       
<script>
    var myPicker = new JSColor('#colorInput', {format:'hex'});
</script>