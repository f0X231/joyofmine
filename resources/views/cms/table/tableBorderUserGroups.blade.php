<div class="card">
    <div class="card-body">
      <h4 class="card-title">{{ __($title) }}</h4>
      <p class="card-description"> {!! $description !!}</p>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">{{ strtoupper(__($header['no'])) }}</th>
            <th class="text-center">{{ strtoupper(__($header['name'])) }}</th>
            <th class="text-center">{{ strtoupper(__($header['display'])) }}</th>
            <th class="text-center">{{ strtoupper(__($header['update_date'])) }}</th>
            <th class="text-center">{{ strtoupper(__($header['tools'])) }}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $item)
            <tr>
              <td class="text-center">{{($key+1)}}</td>
              <td>{{$item['name']}}</td>
              <td>{{$item['display_name']}}</td>
              <td class="text-center">{{$item['updated_at']}}</td>
              <td class="text-center">
                <a href="{{ URL::to('/cms/groups/modify', [$item['id'], $item['name']]) }}"><i class="fa fa-wrench" style="font-size:16px;color:green;"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a href="{{ URL::to('/cms/groups/delete', [$item['id'], $item['name']]) }}"><i class="fa fa-trash" style="font-size:16px;color:red;"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <br />
      <br />
    </div>
  </div>