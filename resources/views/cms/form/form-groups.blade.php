<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ __($title) }}</h4>
        <p class="card-description"> {!! $description !!}</p>
        
        <form class="forms-sample" 
            name="roomForms" 
            method="POST" 
            action="/cms/rooms/process" 
            enctype="multipart/form-data" 
            onsubmit="return validateRoomForm()">
            @csrf
            {{-- Hidden --}}
            <input type="hidden" name="roomInputId" id="roomInputId" value="{{ !empty($room['id']) ? _($room['id']) : '' }}">

        </form>

    </div>
</div>