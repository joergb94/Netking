@if($Card->deleted_at == null)
<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-wrench"></i>
</button>
<div class="dropdown-menu">
  <button class="dropdown-item btn btn-link text-success btn-detail-{{$Card['id']}}"
    onclick="Cards.detail({{$Card['id']}})" href="#">View Detail<i class='fas fa-info-circle'></i></button>
    <button class="dropdown-item btn btn-link text-success btn-detail-{{$Card['id']}}"
    onclick="Cards.QR({{$Card['id']}})" href="#">View QR<i class='fas fa-info-circle'></i></button>
  <button class="dropdown-item btn btn-link text-warning btn-show-{{$Card['id']}}"
    onclick="Cards.edit({{$Card['id']}})" href="#">Edit <i class='fas fa-edit'></i></button>
  <button class="dropdown-item btn btn-link text-danger" onclick="Cards.delete({{$Card['id']}})"
    href="#">Delete <i class='fas fa-trash'></i></button>
</div>

@else
<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
  <i class="fa fa-wrench"></i>
</button>
<div class="dropdown-menu">
  <h5 class="dropdown-header text-center bg-success text-white">Options</h5>
  <button class="dropdown-item btn btn-link text-warning btn-detail-{{$Card['id']}}"
    onclick="Cards.detail({{$Card['id']}})" href="#">View Detail<i class='fas fa-info-circle'></i></button>
</div>
@endif