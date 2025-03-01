@extends('layouts.adminTemplate')

@section('cmscontent')

<!-- partial -->
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> @lang('cms_default.panorama.list.title') </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="/cms/rooms/new">
                        <button class="btn btn-success">@lang('cms_default.panorama.list.btn_add')</button>
                    </a>
                </li>
                {{-- <li class="breadcrumb-item active" aria-current="page">@lang('dashboards.pages.room.form.basecamp.page-all')</li> --}}
            </ol>

            <div class="rows breadcrumb">
              <input type="hidden" name="_tokenCSRF" id="_tokenCSRF" value="{{ csrf_token() }}" />
              <div class="col-12 col-md-4">
                <div class="form-group">
                  <label for="searchSelectPage">เลือกหน้า</label>
                  <select class="form-control" id="searchSelectPage" name="searchSelectPage">
                    @foreach ($searchpage as $key => $page)
                      <option value="{{$key}}">{{$page}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12 col-md-4">
                <label for="searchByText">ค้นหา</label>
                <input type="text" class="form-control" id="searchByText" name="searchByText" aria-describedby="emailHelp" placeholder="ค้นหา">
              </div>
              <div class="col-12 col-md-4">
                <button type="button" id="btnSearchPano" name="btnSearchPano" class="btn btn-secondary mt-4" disabled>ค้นหา</button>
              </div>
            </div>
        </nav>
    </div>

    @include('cms/table/tableBorderPanorama', [
                                            'title'       => 'Panorama Table',
                                            'description' => 'List of all <code>PANORAMA</code> in Joy of Minds',
                                            'panorama'    => $panorama,
                                            'header'      => $header,
                                            'pagination'  => $pagination
                                        ])
</div>

<script>
  $(document).ready(function(){

    $("button").click(function(){
      $("p").slideToggle();

      $.ajax({
        url: "url", 
        type: "POST",
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify({ name: 'value1', email: 'value2' }),
        success: function (result) {
            // when call is sucessfull
          },
          error: function (err) {
          // check the err for error details
          }
      }); /

    });

  });
<script>

@endsection
