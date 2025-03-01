@section('page-style')
  <style>
    select.form-control {
      color: #000;
    }
  </style>
@endsection


<div class="card">
  <div class="card-body">
    <h4 class="card-title"><a hre="/cms/events">@lang('dashboards.pages.event.form.header')</a></h4>
    <p class="card-description"> @lang('dashboards.pages.event.form.description') </p>
      
    <form 
      class="forms-sample" 
      name="eventForms" 
      method="POST" 
      action="/cms/events/process" 
      enctype="multipart/form-data"
      onsubmit="return validateEventForm()">
      @csrf
      {{-- Hidden --}}
      <input type="hidden" name="eventInputId" id="eventInputId" value="{{ !empty($events['sku']) ? _($events['sku']) : '' }}">

      {{-- Name --}}
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInputTitleTH">@lang('dashboards.pages.event.form.fields.name.th') <span class="text-danger">*<span></label>
            <input 
              type="text" 
              class="form-control" 
              id="eventInputTitleTH" 
              name="eventInputTitleTH" 
              placeholder="@lang('dashboards.pages.event.form.placeholder.name-th')" 
              value="{{ !empty($events['nameTH']) ? _($events['nameTH']) : '' }}" />
            <small id="eventInputTitleTHError" class="text-danger d-none">@lang('dashboards.pages.event.form.error.name-th')</small>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInputTitleEN">@lang('dashboards.pages.event.form.fields.name.en') <span class="text-danger">*<span></label>
            <input 
              type="text" 
              class="form-control" 
              id="eventInputTitleEN" 
              name="eventInputTitleEN" 
              placeholder="@lang('dashboards.pages.event.form.placeholder.name-en')" 
              value="{{ !empty($events['nameEN']) ? _($events['nameEN']) : '' }}" />
            <small id="eventInputTitleENError" class="text-danger d-none">@lang('dashboards.pages.event.form.error.name-en')</small>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInputTitleCN">@lang('dashboards.pages.event.form.fields.name.cn') <span class="text-danger">*<span></label>
            <input 
              type="text" 
              class="form-control" 
              id="eventInputTitleCN" 
              name="eventInputTitleCN" 
              placeholder="@lang('dashboards.pages.event.form.placeholder.name-cn')" 
              value="{{ !empty($events['nameCN']) ? _($events['nameCN']) : '' }}" />
            <small id="eventInputTitleCNError" class="text-danger d-none">@lang('dashboards.pages.event.form.error.name-cn')</small>
          </div>
        </div>
      </div>
      {{-- Detail --}}
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventDetailTH">@lang('dashboards.pages.event.form.fields.detail.th') <span class="text-danger">*<span></label>
            <textarea class="form-control" id="eventDetailTH" name="eventDetailTH" rows="4">{!! !empty($events['detailTH']) ? htmlspecialchars_decode($events['detailTH']) : '' !!}</textarea>
            <small id="eventInputDetailTHError" class="text-danger d-none">@lang('dashboards.pages.event.form.error.detail-th')</small>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventDetailEN">@lang('dashboards.pages.event.form.fields.detail.th') <span class="text-danger">*<span></label>
            <textarea class="form-control" id="eventDetailEN" name="eventDetailEN" rows="4">{!! !empty($events['detailEN']) ? htmlspecialchars_decode($events['detailEN']) : '' !!}</textarea>
            <small id="eventInputDetailENError" class="text-danger d-none">@lang('dashboards.pages.event.form.error.detail-en')</small>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventDetailCN">@lang('dashboards.pages.event.form.fields.detail.th') <span class="text-danger">*<span></label>
            <textarea class="form-control" id="eventDetailCN" name="eventDetailCN" rows="4">{!! !empty($events['detailCN']) ? htmlspecialchars_decode($events['detailCN']) : '' !!}</textarea>
            <small id="eventInputDetailCNError" class="text-danger d-none">@lang('dashboards.pages.event.form.error.detail-cn')</small>
          </div>
        </div>
      </div>
      {{-- Time & Price & Discount (30) --}}
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput30Time">@lang('dashboards.pages.event.form.fields.time')</label>
            <input type="text" class="form-control" id="eventInput30Time" name="eventInput30Time" value="30 Min" disabled />
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput30Price">@lang('dashboards.pages.event.form.fields.price')</label>
            <input 
              type="text" 
              class="form-control" 
              id="eventInput30Price" 
              name="eventInput30Price" 
              placeholder="0"
              value="{{ !empty($events['min30price']) ? _($events['min30price']) : 0 }}" />
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput30Discount">@lang('dashboards.pages.event.form.fields.discount')</label>
            <input 
              type="text" 
              class="form-control" 
              id="eventInput30Discount" 
              name="eventInput30Discount" 
              placeholder="0"
              value="{{ !empty($events['min30discount']) ? _($events['min30discount']) : 0 }}" />
          </div>
        </div>
      </div>
      {{-- Time & Price & Discount (60) --}}
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput60Time">@lang('dashboards.pages.event.form.fields.time')</label>
            <input type="text" class="form-control" id="eventInput60Time" name="eventInput60Time" value="60 Min" disabled>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput60Price">@lang('dashboards.pages.event.form.fields.price')</label>
            <input type="text" class="form-control" id="eventInput60Price" name="eventInput60Price" placeholder="0" value="{{ !empty($events['min60price']) ? _($events['min60price']) : 0 }}" />
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput60Discount">@lang('dashboards.pages.event.form.fields.discount')</label>
            <input type="text" class="form-control" id="eventInput60Discount" name="eventInput60Discount" placeholder="0" value="{{ !empty($events['min60discount']) ? _($events['min60discount']) : 0 }}" />
          </div>
        </div>
      </div>
      {{-- Time & Price & Discount (90) --}}
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput90Time">@lang('dashboards.pages.event.form.fields.time')</label>
            <input 
              type="text" class="form-control" id="eventInput90Time" name="eventInput90Time" value="90 Min" disabled>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput90Price">@lang('dashboards.pages.event.form.fields.price')</label>
            <input 
              type="text" 
              class="form-control" 
              id="eventInput90Price" 
              name="eventInput90Price" 
              placeholder="0" 
              value="{{ (!empty($events['min90price']) && $events['min90price'] > 0) ? _($events['min90price']) : 0 }}" />
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput90Discount">@lang('dashboards.pages.event.form.fields.discount')</label>
            <input 
              type="text" 
              class="form-control" 
              id="eventInput90Discount" 
              name="eventInput90Discount" 
              placeholder="0" value="{{ (!empty($events['min90discount']) && $events['min90discount'] > 0) ? _($events['min90discount']) : 0 }}" />
          </div>
        </div>
      </div>
      {{-- Time & Price & Discount (120) --}}
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput120Time">@lang('dashboards.pages.event.form.fields.time')</label>
            <input type="text" class="form-control" id="eventInput120Time" name="eventInput120Time" value="120 Min" disabled>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput120Price">@lang('dashboards.pages.event.form.fields.price')</label>
            <input 
              type="text" 
              class="form-control" 
              id="eventInput120Price" 
              name="eventInput120Price" 
              placeholder="0" 
              value="{{ (!empty($events['min120price']) && $events['min120price'] > 0) ? _($events['min120price']) : 0 }}" />
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInput120Discount">@lang('dashboards.pages.event.form.fields.discount')</label>
            <input 
              type="text" 
              class="form-control" 
              id="eventInput120Discount" 
              name="eventInput120Discount" 
              placeholder="0" 
              value="{{ (!empty($events['min120discount']) && $events['min120discount'] > 0) ? _($events['min120discount']) : 0 }}" />
          </div>
        </div>
      </div>
      {{-- Option --}}
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventInputSKU">@lang('dashboards.pages.event.form.fields.sku') <span class="text-danger">*<span></label>
            <input type="text" class="form-control" id="eventInputSKU" name="eventInputSKU" placeholder="P-03" value="{{ !empty($events['sku']) ? _($events['sku']) : '' }}" />
            <small id="eventInputSKUError" class="text-danger d-none">@lang('dashboards.pages.event.form.error.sku')</small>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="eventSelectStatus">@lang('dashboards.pages.event.form.fields.status')</label>
            <select class="form-control form-control-sm" id="eventSelectStatus" name="eventSelectStatus">
              <option value="Y" @if(!empty($events['is_active']) && $events['is_active'] == "Y") selected @endif>Open</option>
              <option value="N" @if(!empty($events['is_active']) && $events['is_active'] == "N") selected @endif>Close</option>
            </select>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">&nbsp;</div>
      </div>

      {{-- Button --}}
      <button type="submit" class="btn btn-gradient-primary me-2">@lang('dashboards.pages.event.form.button.submit')</button>
      <button type="reset" class="btn btn-secondary">@lang('dashboards.pages.event.form.button.clear')</button>
      <a href="/cms/events"><button type="button" class="btn btn-secondary">@lang('dashboards.pages.event.form.button.back')</button></a>
    </form>

  </div>
</div>


@section('page-script')
  <script type="text/javascript">
    function validateEventForm() 
    {
      let eventTitleTH = document.forms["eventForms"]["eventInputTitleTH"].value;
      let eventTitleEN = document.forms["eventForms"]["eventInputTitleEN"].value;
      let eventTitleCN = document.forms["eventForms"]["eventInputTitleCN"].value;
      let eventDetailTH = document.forms["eventForms"]["eventDetailTH"].value;
      let eventDetailEN = document.forms["eventForms"]["eventDetailEN"].value;
      let eventDetailCN = document.forms["eventForms"]["eventDetailCN"].value;
      let eventSKU = document.forms["eventForms"]["eventInputSKU"].value;

      let validateStatus = true;
      if (eventSKU == null || eventSKU == "") {
        document.getElementById("eventInputSKUError").classList.remove("d-none");
        document.getElementById("eventInputSKU").focus();
        validateStatus = false;
      }

      if (eventDetailCN == null || eventDetailCN == "") {
        document.getElementById("eventInputDetailCNError").classList.remove("d-none");
        document.getElementById("eventDetailCN").focus();
        validateStatus = false;
      }

      if (eventDetailEN == null || eventDetailEN == "") {
        document.getElementById("eventInputDetailENError").classList.remove("d-none");
        document.getElementById("eventDetailEN").focus();
        validateStatus = false;
      }

      if (eventDetailTH == null || eventDetailTH == "") {
        document.getElementById("eventInputDetailTHError").classList.remove("d-none");
        document.getElementById("eventDetailTH").focus();
        validateStatus = false;
      }

      if (eventTitleCN == null || eventTitleCN == "") {
        document.getElementById("eventInputTitleCNError").classList.remove("d-none");
        document.getElementById("eventInputTitleCN").focus();
        validateStatus = false;
      }

      if (eventTitleEN == null || eventTitleEN == "") {
        document.getElementById("eventInputTitleENError").classList.remove("d-none");
        document.getElementById("eventInputTitleEN").focus();
        validateStatus = false;
      }

      if (eventTitleTH == null || eventTitleTH == "") {
        document.getElementById("eventInputTitleTHError").classList.remove("d-none");
        document.getElementById("eventInputTitleTH").focus();
        validateStatus = false;
      }

      if(validateStatus) {
        document.getElementById("eventInputTitleTHError").classList.add("d-none");
        document.getElementById("eventInputTitleENError").classList.add("d-none");
        document.getElementById("eventInputTitleCNError").classList.add("d-none");
        document.getElementById("eventInputDetailTHError").classList.add("d-none");
        document.getElementById("eventInputDetailENError").classList.add("d-none");
        document.getElementById("eventInputDetailCNError").classList.add("d-none");
        document.getElementById("eventInputSKUError").classList.add("d-none");
        return true;
      }
      
      return false;
    }
  </script>
@endsection