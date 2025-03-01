@extends('layouts.jomTemplate')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-12">
        @include('includes.banner')
      </div>
    </div>

    <div class="row article__main_article_detail">
      <div class="col-12">
          <h1 class="colorPrimary">{{$data['title']['th']}}</h1>
      </div>
      <div class="col-12">
          <hr class="lineFull" />
      </div>
    </div>

    @if(!empty($data['detail']['th']))
      <div class="row">
          <div class="col-12 article__txt fontSize15rem">{!! $data['detail']['th'] !!}</div>
          <div class="col-12 fontSize125rem">
            <br />
            <br />
            <p>{{ __('article.txt_credit') }} : {{$data['credit']}}</p>
            <p>{{ __('article.txt_footer') }}</p>
            <p>{{ __('article.txt_connect_txt') }} &middot; {!! __('article.txt_phone') !!} &middot; {!! __('article.txt_line') !!}</p>
          </div>
          <div class="col-12 fontSize125rem text-center">
            <br />
            <br />
            <a href="{{ URL::to('articles') }}">
              <b>
                <img src="{{ asset('images/back.svg') }}" class="icoNavbar" /> {{ __('article.txt_goback') }}
              </b>
            </a>
            <br />
          </div>
      </div>
    @endif
</div>

@stop