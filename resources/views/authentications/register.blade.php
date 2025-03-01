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
              <h4>@lang('authen.register.title')</h4>
              <h6 class="font-weight-light">@lang('authen.register.text')</h6>
              <form 
                id="regForm" 
                name="regForm"
                class="pt-3" 
                method="POST" 
                action="/new-user" 
                enctype="multipart/form-data"
                onsubmit="return validateRegisterForm()">
              @csrf
                <div class="form-group">
                  <input 
                    type="text" 
                    class="form-control form-control-lg" 
                    id="regUsername" 
                    name="regUsername"
                    placeholder="@lang('authen.register.input.username.placeholder')" />
                </div>
                <div class="form-group">
                  <input 
                    type="email" 
                    class="form-control form-control-lg" 
                    id="regEmail" 
                    name="regEmail"
                    placeholder="@lang('authen.register.input.email.placeholder')" />
                </div>
                <div class="form-group">
                  <input 
                    type="text" 
                    class="form-control form-control-lg" 
                    id="regName" 
                    name="regName" 
                    placeholder="@lang('authen.register.input.name.placeholder')" />
                </div>
                <div class="form-group">
                  <input 
                    type="text" 
                    class="form-control form-control-lg" 
                    id="regPhone" 
                    name="regPhone" 
                    placeholder="@lang('authen.register.input.phone.placeholder')" />
                </div>
                <div class="form-group">
                  <input 
                    type="password" 
                    class="form-control form-control-lg" 
                    id="regPassword" 
                    name="regPassword" 
                    placeholder="@lang('authen.register.input.password.placeholder')" />
                </div>
                <div class="form-group">
                  <input 
                    type="password" 
                    class="form-control form-control-lg" 
                    id="regPasswordAgain" 
                    name="regPasswordAgain" 
                    placeholder="@lang('authen.register.input.passwordagain.placeholder')" />
                </div>
                <div class="mt-3">
                  <button type="submit" class="button">@lang('authen.register.btn-singup')</button>
                  {{-- <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a> --}}
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
    function validateRegisterForm() 
    {
       let username = document.forms["regForm"]["regUsername"].value;
       let email = document.forms["regForm"]["regEmail"].value;
       let name = document.forms["regForm"]["regName"].value;
       let phone = document.forms["regForm"]["regPhone"].value;
       let password = document.forms["regForm"]["regPassword"].value;
       let confirmPassword = document.forms["regForm"]["regPasswordAgain"].value;
 
       let validateStatus = true;
       if (username == null || username == "") {
         alert("@lang('authen.register.input.username.error')");
         document.getElementById("regUsername").focus();
         validateStatus = false;
       }
       else if (email == null || email == "") {
         alert("@lang('authen.register.input.email.error')");
         document.getElementById("regEmail").focus();
         validateStatus = false;
       }
       else if (name == null || name == "") {
         alert("@lang('authen.register.input.name.error')");
         document.getElementById("regName").focus();
         validateStatus = false;
       }
       else if (phone == null || phone == "") {
         alert("@lang('authen.register.input.phone.error')");
         document.getElementById("regPhone").focus();
         validateStatus = false;
       }
       else if (password == null || password == "") {
         alert("@lang('authen.register.input.password.error')");
         document.getElementById("regPassword").focus();
         validateStatus = false;
       }
       else if (confirmPassword == null || confirmPassword == "") {
         alert("@lang('authen.register.input.passwordagain.error')");
         document.getElementById("regPasswordAgain").focus();
         validateStatus = false;
       }
       else if (confirmPassword != password) {
         alert("@lang('authen.register.input.passwordagain.error')");
         document.getElementById("regPasswordAgain").focus();
         validateStatus = false;
       }
       else if(validateStatus) {
          validateStatus = true
         return true;
       }
       else {
         return false;
       }
       
       return false;
     }
   </script>
@endsection