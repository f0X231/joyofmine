<div class="card">
    <div class="card-body">
      <h4 class="card-title">{{ __($title) }}</h4>
      <p class="card-description"> {!! $description !!}</p>

      <table class="table table-bordered">
        <thead>
          <tr>
            @foreach ($header as $head)
              <th class="text-center"><strong>{{ strtoupper(__($head['title'])) }}</strong></th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach ($rooms as $key => $room)
            <tr>
              <td class="text-{{_($header['id']['position'])}}">{{ __($key + 1) }}</td>
              <td class="text-{{_($header['name']['position'])}}">{{ __($room['name']) }}</td>
              <td class="text-{{_($header['size']['position'])}}">{{ __($room['size']) }}</td>
              <td class="text-{{_($header['is_active']['position'])}}">
                @if($room['is_active'] == 'Y')
                  <span class="mx-3">
                    <a href="/cms/rooms/onoff/{{_($room['id'])}}/on"><i class="mdi mdi-eye menu-icon"></i></a>
                  </span>
                @else
                  <span class="mx-3">
                    <a href="/cms/rooms/onoff/{{_($room['id'])}}/off"><i class="mdi mdi-eye-off menu-icon"></i></a>
                  </span>
                @endif

                <span class="mx-3">
                  <a href="/cms/rooms/modify/{{_($room['id'])}}"><i class="mdi mdi-pencil menu-icon"></i></a>
                </span>
                <span class="mx-3">
                  <a href="/cms/rooms/delete/{{_($room['id'])}}" onclick="return confirm('@lang('dashboards.pages.room.form.alert.delroom')')">
                    <i class="mdi mdi-delete menu-icon"></i>
                  </a>
                </span>
              </td>
              <td class="text-{{_($header['updated_at']['position'])}}">{{ __( (new DateTime($room['updated_at']))->format('d/m/Y H:i') ) }}</td>
            </tr>
          @endforeach
          {{-- <tr>
            <td> 7 </td>
            <td> Henry Tom </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td> $ 150.00 </td>
            <td> June 16, 2015 </td>
          </tr> --}}
        </tbody>
      </table>
    </div>
  </div>