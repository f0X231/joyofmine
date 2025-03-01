@extends('layouts/adminBlankLayout')

@section('title', 'Register / Sing up')

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
                <img src="/images/logo-big-circle.png" width="250">
              </div>
              <h4>@lang('authen.forgot.title')</h4>
              <h6 class="font-weight-light">@lang('authen.forgot.text')</h6>
              <form
                id="forgotForm" 
                name="forgotForm" 
                class="pt-3"
                method="POST" 
                action="/reset-password" 
                enctype="multipart/form-data"
                onsubmit="return validateForgotForm()">
                @csrf
                <div class="form-group">
                  <input 
                    type="email" 
                    class="form-control form-control-lg" 
                    id="forgotEmail" 
                    name="forgotEmail"
                    placeholder="@lang('authen.forgot.input.email.placeholder')" />
                </div>
                <div class="mt-3">
                  <button type="submit" class="button">@lang('authen.forgot.btn-send')</button>
                  {{-- <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SEND</a> --}}
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
    function ValidateEmail(email) 
    {
      var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if(email.match(validRegex)) 
            return true;
      else  return false;
    }

    function validateForgotForm() 
    {
      let email = document.forms["forgotForm"]["forgotEmail"].value;
 
      let validateStatus = true;
      if (email == null || email == "" || !ValidateEmail(email))
      {
        alert("@lang('authen.register.input.email.error')");
        document.getElementById("regEmail").focus();
        validateStatus = false;
      }
      else if(validateStatus) {
        validateStatus = true
        return true;
      }
      else return false;

      return false;
    }
   </script>
@endsection