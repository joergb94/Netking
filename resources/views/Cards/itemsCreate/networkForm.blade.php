@if ($data[''])
    @foreach ($collection as $item)
        
    @endforeach
@else
<div class="col-sm-12" id='data-card'>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" id="facebook" >
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label for="twitter">Twitter</label>
                <input name="twitter" id="twitter" class="form-control" >
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label for="spotify">Spotify</label>
                <input name="spotify" id="spotify" class="form-control">
            </div>
        </div>
    </div>
    </div>
@endif
