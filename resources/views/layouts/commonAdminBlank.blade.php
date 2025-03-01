<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Joy of Minds content management system | @yield('title')</title>
    <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
    <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
  
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <!-- Canonical SEO -->
    <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
  
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}" />

    <!-- Include Styles -->
    @include('layouts/sections/style/stylesAdminBlank')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts/sections/script/scriptsIncludesAdminBlank')
</head>

<body>
  <!-- Layout Content -->
  @yield('layoutContent')
  <!--/ Layout Content -->

  <!-- Include Scripts -->
  @include('layouts/sections/script/scriptsAdminBlank')

</body>

</html>
