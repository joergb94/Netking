
<button class="btn btn-secondary btn-circle top-right-btn" data-toggle="tooltip"title="Editar Keypl!"   value="{{$friend?1:0}}" id="btn-follow">
    @if($friend == true) 
        <span ><i class="fas fa-user-check"></i></span>
    @else
        <span ><i class="fas fa-user-plus"></i></span>
    @endif
</button>