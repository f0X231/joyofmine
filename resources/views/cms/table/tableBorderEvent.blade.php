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
            @foreach ($events as $key => $event)
                <tr>
                    <td class="text-{{_($header['id']['position'])}}">{{ __($key + 1) }}</td>
                    <td class="text-{{_($header['name']['position'])}}">{{ __($event['name']) }}</td>
                    <td class="text-{{_($header['min30price']['position'])}}">{{ __($event['min30price']-$event['min30discount']) }}</td>
                    <td class="text-{{_($header['min60price']['position'])}}">{{ __($event['min60price']-$event['min60discount']) }}</td>
                    <td class="text-{{_($header['min90price']['position'])}}">{{ __($event['min90price']-$event['min90discount']) }}</td>
                    <td class="text-{{_($header['min120price']['position'])}}">{{ __($event['min120price']-$event['min120discount']) }}</td>
                    <td class="text-{{_($header['is_active']['position'])}}">
                        @if($event['is_active'] == 'Y')
                        <span class="mx-3">
                            <a href="/cms/events/onoff/{{_($event['sku'])}}/on"><i class="mdi mdi-eye menu-icon"></i></a>
                        </span>
                        @else
                        <span class="mx-3">
                            <a href="/cms/events/onoff/{{_($event['sku'])}}/off"><i class="mdi mdi-eye-off menu-icon"></i></a>
                        </span>
                        @endif

                        <span class="mx-3">
                        <a href="/cms/events/modify/{{_($event['sku'])}}"><i class="mdi mdi-pencil menu-icon"></i></a>
                        </span>
                        <span class="mx-3">
                        <a href="/cms/events/delete/{{_($event['sku'])}}" onclick="return confirm('@lang('dashboards.pages.event.form.alert.delevent')')">
                            <i class="mdi mdi-delete menu-icon"></i>
                        </a>
                        </span>
                    </td>
                    <td class="text-{{_($header['updated_at']['position'])}}">{{ __( (new DateTime($event['updated_at']))->format('d/m/Y H:i') ) }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>