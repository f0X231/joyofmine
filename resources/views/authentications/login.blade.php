@extends('layouts/adminBlankLayout')

@section('title', 'Login / Sing in')

@section('content')
  <style>
    .button {
      background-color: #d5c300;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
  </style>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                <img src="/images/logo.svg" width="250">
              </div>
              <h4>@lang('authen.login.title')</h4>
              <h6 class="font-weight-light">@lang('authen.login.text')</h6>
              <form 
                id="loginForm" 
                name="loginForm"
                class="pt-3" 
                method="POST" 
                action="/authentication" 
                enctype="multipart/form-data"
                onsubmit="return validateLoginForm()">
              @csrf
                <div class="form-group">
                  <input 
                    type="text" 
                    class="form-control form-control-lg" 
                    id="usernameLogin" 
                    name="usernameLogin"
                    placeholder="@lang('authen.login.input.username.placeholder')" />
                </div>
                <div class="form-group">
                  <input 
                    type="password" 
                    class="form-control form-control-lg" 
                    id="passwordLogin" 
                    name="passwordLogin"
                    placeholder="@lang('authen.login.input.password.placeholder')" />
                </div>
                <div class="mt-3 text-center">
                  <button type="submit" class="button">@lang('authen.login.btn-singin')</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">&nbsp;
                    {{-- <label class="form-check-label text-muted"><input type="checkbox" class="form-check-input"> Keep me signed in </label> --}}
                  </div>
                  <a href="/forgot-password" class="auth-link text-black">@lang('authen.login.forgot')</a>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <script>
   function validateLoginForm() 
   {
      let username = document.forms["loginForm"]["usernameLogin"].value;
      let password = document.forms["loginForm"]["passwordLogin"].value;

      let validateStatus = true;
      if (username == null || username == "") {
        alert("@lang('authen.login.input.username.error')");
        document.getElementById("usernameLogin").focus();
        validateStatus = false;
      }
      else if (password == null || password == "") {
        alert("@lang('authen.login.input.password.error')");
        document.getElementById("passwordLogin").focus();
        validateStatus = false;
      }
      else if(validateStatus) {
        return true;
      }
      else {
        return false;
      }
      
      return false;
    }
  </script>
@endsection
    