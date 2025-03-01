@section('page-style')
  <style>
    select.form-control {
      color: #000;
    }
  </style>
@endsection

<div class="card">
  <div class="card-body">
    <h4 class="card-title"><a hre="/cms/rooms">@lang('dashboards.pages.room.form.header')</a></h4>
    <p class="card-description"> @lang('dashboards.pages.room.form.description') </p>
      
    <form class="forms-sample" 
      name="roomForms" 
      method="POST" 
      action="/cms/rooms/process" 
      enctype="multipart/form-data" 
      onsubmit="return validateRoomForm()">
      @csrf
      {{-- Hidden --}}
      <input type="hidden" name="roomInputId" id="roomInputId" value="{{ !empty($room['id']) ? _($room['id']) : '' }}">
      {{-- Room Name --}}
      <div class="form-group">
        <label for="roomInputName">@lang('dashboards.pages.room.form.fields.name') <span class="text-danger">*<span></label>
        <input 
          type="text" 
          class="form-control" 
          id="roomInputName" 
          name="roomInputName" 
          maxlength="50"
          placeholder="@lang('dashboards.pages.room.form.placeholder.name')"
          value="{{ !empty($room['name']) ? _($room['name']) : '' }}" />
        <small id="roomInputNameError" class="text-danger d-none">@lang('dashboards.pages.room.form.error.name')</small>
      </div>
      {{-- Room Size --}}
      <div class="form-group">
        <label for="roomInputSize">@lang('dashboards.pages.room.form.fields.size') <span class="text-danger">*<span></label>
        <select class="form-control form-control-sm" id="roomInputSize" name="roomInputSize">
          @for ($i=1; $i<=14; $i++)
            @if(!empty($room['size']))
              @if($i == $room['size'])
                <option value="{{ $i }}" selected>{{ $i }}</option>
              @else
                <option value="{{ $i }}">{{ $i }}</option>
              @endif
            @else
              @if($i == 2)
                <option value="{{ $i }}" selected>{{ $i }}</option>
              @else
                <option value="{{ $i }}">{{ $i }}</option>
              @endif
            @endif
          @endfor
        </select>
      </div>
      {{-- Room Status --}}
      <div class="form-group">
        <label for="roomInputStatus">@lang('dashboards.pages.room.form.fields.status') <span class="text-danger">*<span></label>
        <select class="form-control form-control-sm" id="roomInputStatus" name="roomInputStatus">
          <option value="Y" @if(!empty($room['is_active']) && $room['is_active'] == "Y") selected @endif>Open</option>
          <option value="N" @if(!empty($room['is_active']) && $room['is_active'] == "N") selected @endif>Close</option>
        </select>
      </div>


      {{-- Button --}}
      <button type="submit" class="btn btn-gradient-primary me-2">@lang('dashboards.pages.room.form.button.submit')</button>
      <button type="reset" class="btn btn-secondary">@lang('dashboards.pages.room.form.button.clear')</button>
      <a href="/cms/rooms"><button type="button" class="btn btn-secondary">@lang('dashboards.pages.room.form.button.back')</button></a>
    </form>

  </div>
</div>

@section('page-script')
  <script type="text/javascript">
    function validateRoomForm() 
    {
      let roomName = document.forms["roomForms"]["roomInputName"].value;

      if (roomName == null || roomName == "") {
        document.getElementById("roomInputNameError").classList.remove("d-none");
        document.getElementById("roomInputName").focus();
        return false;
      }
      else {
        document.getElementById("roomInputNameError").classList.add("d-none");
        return true;
      }
      
      return false;
    }
  </script>
@endsection