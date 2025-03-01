@section('page-style')
  <style>
    select.form-control {
      color: #000;
    }
  </style>
@endsection

<div class="card">
  <div class="card-body">
    <h4 class="card-title"><a hre="/cms/panorama">@lang('dashboards.pages.panorama.form.header')</a></h4>
    <p class="card-description"> @lang('dashboards.pages.panorama.form.description') </p>
      
    <form 
      class="forms-sample" 
      name="panoramaForms" 
      method="POST" 
      action="/cms/panorama/process" 
      enctype="multipart/form-data"
      onsubmit="return validateRoomForm()">
      @csrf
      {{-- Hidden --}}
      <input type="hidden" name="roomInputId" id="roomInputId" value="{{ !empty($pano['sku']) ? _($pano['sku']) : '' }}">

      {{-- Name --}}
      <div class="form-group">
        <label for="panoInputName">@lang('dashboards.pages.panorama.form.fields.name') <span class="text-danger">*<span></label>
        <input 
          type="text" 
          class="form-control" 
          id="panoInputName" 
          name="panoInputName" 
          maxlength="50"
          placeholder="@lang('dashboards.pages.panorama.form.placeholder.name')"
          value="{{ !empty($pano['name']) ? _($pano['name']) : '' }}" />
        <small id="panoInputNameError" class="text-danger d-none">@lang('dashboards.pages.panorama.form.error.name')</small>
      </div>
      {{-- Title --}}
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="panoInputTitleTH">Title (Thai)</label>
            <input type="text" class="form-control" id="panoInputTitleTH" name="panoTitleTH" placeholder="Title" />
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="panoInputTitleEN">Title (English)</label>
            <input type="text" class="form-control" id="panoInputTitleEN" name="panoTitleEN" placeholder="Title">
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="panoInputTitleCN">Title (Chinese)</label>
            <input type="text" class="form-control" id="panoInputTitleCN" name="panoTitleCN" placeholder="Title">
          </div>
        </div>
      </div>
      {{-- Upload --}}
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label>File upload</label>
            <input class="form-control form-control-lg" type="file" id="panoFileIMGTH" name="panoFileIMGTH" />
            <div class="input-group col-xs-12 text-center">
              <img src="/images/nopreview.jpg" width="250" class="image_preview" id="previewPanoIMGTH" />
            </div>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label>File upload</label>
            <input type="file" name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label>File upload</label>
            <input type="file" name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      {{-- Detail --}}
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="panoTextareaDetailTH">Detail (Thai)</label>
            <textarea class="form-control" id="panoTextareaDetailTH" rows="4"></textarea>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="panoTextareaDetailEN">Detail (English)</label>
            <textarea class="form-control" id="panoTextareaDetailEN" rows="4"></textarea>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="panoTextareaDetailCN">Detail (Chinese)</label>
            <textarea class="form-control" id="panoTextareaDetailCN" rows="4"></textarea>
          </div>
        </div>
      </div>
      {{-- Option --}}
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="exampleSelectGender">Order</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect3">
              @for ($i=1; $i<=9; $i++)
                @if(!empty($pano['ranking']))
                  @if($i == $pano['ranking'])
                    <option value="{{ $i }}" selected>{{ $i }}</option>
                  @else
                    <option value="{{ $i }}">{{ $i }}</option>
                  @endif
                @else
                  @if($i == 1)
                    <option value="{{ $i }}" selected>{{ $i }}</option>
                  @else
                    <option value="{{ $i }}">{{ $i }}</option>
                  @endif
                @endif
              @endfor
            </select>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">
          <div class="form-group">
            <label for="exampleSelectGender">Status</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect3">
              <option value="Y">Open</option>
              <option value="N">Close</option>
            </select>
          </div>
        </div>
        <div class="col-lg-4 mx-auto">&nbsp;</div>
      </div>

      {{-- Button --}}
      <button type="submit" class="btn btn-gradient-primary me-2">@lang('dashboards.pages.panorama.form.button.submit')</button>
      <button type="reset" class="btn btn-secondary">@lang('dashboards.pages.panorama.form.button.clear')</button>
      <a href="/cms/panorama"><button type="button" class="btn btn-secondary">@lang('dashboards.pages.panorama.form.button.back')</button></a>
    </form>

  </div>
</div>

@section('page-script')
  <script type="text/javascript">
    function validateRoomForm() 
    {
      let roomName = document.forms["panoramaForms"]["roomInputName"].value;

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

    $(document).ready(function() {
      //todo:image preview
      $(document).on('change','#panoFileIMGTH', function() {
        console.log('xxxxxx')
      //     $('.error_success_msg_container').html('');
      //     if (this.files && this.files[0]) {
      //         let img = document.querySelector('.image_preview');
      //         img.onload = () =>{
      //             URL.revokeObjectURL(img.src);
      //         }
      //         img.src = URL.createObjectURL(this.files[0]);
      //         document.querySelector(".image_preview").files = this.files;
      //     }
      });

      //todo:update image
      // $(document).on('submit','#image_upload_form',function(e){
      //     e.preventDefault();
      //     let form_data = new FormData(this);
      //     $.ajax({
      //         method:'post',
      //         data:form_data,
      //         cache:false,
      //         contentType: false,
      //         processData: false,
      //         success:function(res){
      //             $('.error_success_msg_container').html('');
      //             $('.image_preview').hide();
      //             if(res.status=='success'){
      //                 $('.error_success_msg_container').html('<p class="text-success">Image Successfully Uploaded</p>');
      //             }
      //         },
      //         error:function(err){
      //             let error = err.responseJSON;
      //             $('.error_success_msg_container').html('');
      //             $.each(error.errors, function (index, value) {
      //                 $('.error_success_msg_container').append('<p class="text-danger">'+value+'<p>');
      //             });
      //         }
      //     });
      // });

    })
  </script>
@endsection