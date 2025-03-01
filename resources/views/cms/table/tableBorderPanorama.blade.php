<div class="card">
    <div class="card-body">
      <h4 class="card-title">{{ __($title) }}</h4>
      <p class="card-description"> {!! $description !!}</p>

      <table class="table table-bordered">
        <thead>
          <tr>
            {{-- <th class="text-center">{{ strtoupper(__($header['no'])) }}</th> --}}
            <th class="text-center">{{ strtoupper(__($header['picture'])) }}</th>
            <th class="text-center">{{ strtoupper(__($header['title'])) }}</th>
            <th class="text-center">{{ strtoupper(__($header['page'])) }}</th>
            <th class="text-center">{{ strtoupper(__($header['start_date'])) }}</th>
            <th class="text-center">{{ strtoupper(__($header['end_date'])) }}</th>
            <th class="text-center">{{ strtoupper(__($header['update_date'])) }}</th>
            <th class="text-center">{{ strtoupper(__($header['tools'])) }}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($panorama as $key => $item)
            <tr>
              {{-- <td class="text-center">{{($key+1)}}</td> --}}
              <td class="text-center"><img src="{{$item['sourcefile']['th']}}" height="100" width="auto" /></td>
              <td>{{$item['title']}}</td>
              <td class="text-center">{{$item['page']}}</td>
              <td class="text-center">{{$item['startdate']}}</td>
              <td class="text-center">{{$item['enddate']}}</td>
              <td class="text-center">{{$item['updatedate']}}</td>
              <td class="text-center">
                <a href="{{ URL::to('/cms/panorama/modify', [$item['id'], $item['title']]) }}"><i class="fa fa-wrench" style="font-size:16px;color:green;"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a href="{{ URL::to('/cms/panorama/delete', [$item['id'], $item['title']]) }}"><i class="fa fa-trash" style="font-size:16px;color:red;"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <br />
      @include('cms/other_ui/pagination', [ 'pagination'  => $pagination ])
      <br />
      <br />
    </div>
  </div>