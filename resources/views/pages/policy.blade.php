@extends('layouts.jomTemplate')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">


<section class="ppolicy" id="vision_mission">
  <div class="container">
    <div class="row">
      <div class="col-12 policy__main">
          <h1 class="fontSize2rem">{{ __('policy.title') }}</h1>
          <p class="fontSize15rem">{{ __('policy.detail') }}</p>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="row">
    <div class="col-12 policy__pvm">
        <h3>{{ __('policy.cookie_title') }}</h3>
        <p class="fontSize15rem">{{ __('policy.cookie_detail') }}</p>
        <br />
        <h3>{{ __('policy.adv_title') }}</h3>
        <p class="fontSize15rem">{{ __('policy.adv_detail') }}</p>
        <br />
        <h3>{{ __('policy.work_title') }}</h3>
        <p class="fontSize15rem">{!! __('policy.work_detail') !!}</p>
        <br />
    </div>
  </div>
</div>

@stop