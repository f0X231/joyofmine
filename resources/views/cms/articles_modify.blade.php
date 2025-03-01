@extends('layouts.adminTemplate')

@section('cmscontent')

<!-- Content -->
<style>
  textarea { min-height: 550px; }
  .marginTop50 { margin-top: 25px; }
</style>

<form name="form_article" action="/cms/article/save" method="post" enctype="multipart/form-data">
  @csrf
  <!-- Equivalent to... -->
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

  <div class="row">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Create an Article!</h6>
          <input class="btn btn-primary" type="submit" value="SAVE">  
        </div>
      
        <!--title detail thumbnail gallery home active-->
        <!-- Title -->
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="row marginTop50">
              <!-- title -->
              <div class="input-group col-md-6 col-12">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Title [TH]</span>
                </div>
                <input id="title_th" name="title_th" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="input-group col-md-6 col-12">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Title [EN]</span>
                </div>
                <input id="title_en" name="title_en" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>

              <!-- credit & order -->
              <div class="input-group col-md-6 col-12">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Order No.</span>
                </div>
                <input id="order_number" name="order_number" type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="input-group col-md-6 col-12">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Credit:</span>
                </div>
                <input id="credit_name" name="credit_name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>

              <!-- Thumbnail -->
              <div class="col-12 marginTop50"><h4>Picture : </h4></div>
              <div class="input-group col-md-6 col-12">
                <input type='file' id="picture_thai" name="picture_thai" class="uploadpicture" />
                <img id="preview_picture_thai" src="/images/cms/defaultPicture.jpg" alt="your image" width="100%" />
              </div>
              <div class="input-group col-md-6 col-12">
                <input type='file' id="picture_eng" name="picture_eng"  class="uploadpicture" />
                <img id="preview_picture_eng" src="/images/cms/defaultPicture.jpg" alt="your image" width="100%" />
              </div>

              <!-- Detail -->
              <div class="col-md-12 marginTop50">
                <h3>Detail</h3>
                <nav>
                  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-thai-tab" data-toggle="tab" href="#nav-thai" role="tab" aria-controls="nav-home" aria-selected="true">Thai</a>
                    <a class="nav-item nav-link" id="nav-eng-tab" data-toggle="tab" href="#nav-eng" role="tab" aria-controls="nav-profile" aria-selected="false">English</a>
                  </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-thai" role="tabpanel" aria-labelledby="nav-thai-tab">
                    <textarea class="tiny_editor" name="detailArticleThai">
                      Hello, World! thai
                    </textarea>
                  </div>
                  <div class="tab-pane fade" id="nav-eng" role="tabpanel" aria-labelledby="nav-eng-tab">
                    <textarea class="tiny_editor" name="detailArticleEng">
                      Hello, World! eng
                    </textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      
    </div>
  </div>
</div>
</form>

<script src="https://cdn.tiny.cloud/1/nig29clktrze1mcvyv2a064y32mkqghs1gw227e0u5rigms3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
      selector: 'textarea.tiny_editor',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
  });

  function delete(id) {
    var r = confirm("Are your such for delete it!");
    if (r == true) {
      txt = "You pressed OK!";
    } 
  }

  function readURL(input, previewName) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) { $('#'+previewName).attr('src', e.target.result);}
      
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  jQuery(document).ready(function() {
    $('body').fadeIn();
    $(".uploadpicture").change(function() { 
      let previewAt = 'preview_' + $(this).attr('id');
      readURL(this, previewAt); 
    });

  });
</script>

@stop
