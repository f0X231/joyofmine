@extends('layouts.jomTemplate')

@section('content')

@include('includes.banner')

<div class="container">
    <div class="row">
        <div class="col-12 services__main">
            <h1 class="colorPrimary fontSize3rem">{{ __('service.service_title') }}</h1>
            <p class="fontSize15rem">{{ __('service.service_detail') }}</p>
            <p class="fontSize15rem">{!! __('service.service_option') !!}</p>
            <ul class="list-article">
              <li><a href="https://joyofminds.com/employee-program">{{ __('service.service_article04') }} <img src="/images/ico_new.gif" width="50" /></a></li>
              <li><a href="https://www.joyofminds.com/articles/41/%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%88%E0%B8%B4%E0%B8%95%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%84%E0%B8%B7%E0%B8%AD%E0%B8%AD%E0%B8%B0%E0%B9%84%E0%B8%A3-%E0%B8%97%E0%B8%B3%E0%B9%84%E0%B8%9B%E0%B8%97%E0%B8%B3%E0%B9%84%E0%B8%A1-%E0%B9%81%E0%B8%A5%E0%B9%89%E0%B8%A7%E0%B8%A1%E0%B8%B5%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%97%E0%B8%94%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%AD%E0%B8%B0%E0%B9%84%E0%B8%A3%E0%B8%9A%E0%B9%89%E0%B8%B2%E0%B8%87?">{{ __('service.service_article01') }}</a></li>
              <li><a href="https://www.joyofminds.com/articles/42/%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%83%E0%B8%AB%E0%B9%89%E0%B8%84%E0%B8%B3%E0%B8%9B%E0%B8%A3%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%97%E0%B8%B3%E0%B8%88%E0%B8%B4%E0%B8%95%E0%B8%9A%E0%B8%B3%E0%B8%9A%E0%B8%B1%E0%B8%94%E0%B9%80%E0%B8%A2%E0%B8%B5%E0%B8%A2%E0%B8%A7%E0%B8%A2%E0%B8%B2%E0%B8%9B%E0%B8%B1%E0%B8%8D%E0%B8%AB%E0%B8%B2%E0%B8%88%E0%B8%B4%E0%B8%95%E0%B9%83%E0%B8%88%E0%B9%84%E0%B8%94%E0%B9%89%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%84%E0%B8%A3">{{ __('service.service_article02') }}</a></li>
              <li><a href="https://www.joyofminds.com/articles/43/%E0%B8%81%E0%B8%B4%E0%B8%88%E0%B8%81%E0%B8%A3%E0%B8%A3%E0%B8%A1%E0%B8%9A%E0%B8%B3%E0%B8%9A%E0%B8%B1%E0%B8%94%E0%B8%84%E0%B8%B7%E0%B8%AD%E0%B8%AD%E0%B8%B0%E0%B9%84%E0%B8%A3?">{{ __('service.service_article03') }}</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
      @foreach ($data as $item)
          <div class="col-sm-4 col-12">
              <a href="{{$item['slug']['th']}}">
                <div class="services__item">
                  <img src="{{$item['thumbnail']['th']}}" width="100%" class="services__thumbnail" />
                  <h3 class="text-center colorPrimary fontSize2rem services__item__title">{{$item['title']['th']}}</h3>
                </div>
              </a>
          </div>
      @endforeach
      <div class="col-sm-4 col-12">
        <a href="https://joyofminds.com/employee-program">
          <div class="services__item">
            <img src="/images/services/service_03.jpg" width="100%" class="services__thumbnail" />
            <h3 class="text-center colorPrimary fontSize2rem services__item__title">{{ __('service.service_article04') }}</h3>
          </div>
        </a>
      </div>
    </div>
</div>

@stop