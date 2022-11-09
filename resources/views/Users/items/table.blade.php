<div id="index_table">
  <div class="row">
    <!--table section-->
    <div class="col">
      <div class="col-12">
        <table class="table table-bordered text-center">
          <thead class="head-biopy">
            <tr>
              <th>Full Name</th>
              <th class="td-diplay">Phone</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            @forelse($data as $user)
            <tr id="User{{$user->id}}">
              <td>{{ $user->name }}
              <td class="td-diplay">{{ $user->phone}}</td>
              <td class="btn-td">@include('Users.items.buttons', ['user' => $user])</td>
            </tr>
            @empty
            <tr id="table-row" class="text-center">
              <th colspan="3" class="text-center no-data">
                <h1 class="text-biopy">There is no Data</h1>
              </th>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <!--pagination section-->
    <div class="col-sm-12">
      <br>
      <div class="row">
        <div class="col-7 span-lg-diplay">
          <div class="float-left">
            {!! $data->total() !!} {{ trans_choice('Usuario|Users', $data->total()) }}
          </div>
        </div>
        <!--col-->
        <div class="col-5 span-lg-diplay">
          <div class="float-right">
            {!! $data->render() !!}
          </div>
        </div>
        <div class="col-12 span-sm-diplay scroll-paginate">
          {!! $data->render() !!}
        </div>
        <!--col-->
      </div>
      <!--row-->
    </div>
  </div>
</div>