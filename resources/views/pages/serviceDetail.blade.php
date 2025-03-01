@extends('layouts.jomTemplate')

@section('content')

@include('includes.banner')

<div class="container">
    <!-- Content -->
    <div class="row">
        <div class="col-12 services__main">
            <h1 class="colorPrimary fontSize3rem">{{$data['title']['th']}}</h1>
            <p class="fontSize15rem">{!! $data['description']['th'] !!}</p>
        </div>
    </div>
    @if($data['id'] == 3) 
      <div class="row">
        <div class="col-sm-12 col-12 services__detail fontSize125rem">
          {!!$data['detail']['th']!!}
          <br />
            <div class="fontSize125rem">
              <a href="{{ URL::to('services') }}">
                <b>
                  <img src="{{ asset('images/back.svg') }}" class="icoNavbar" /> {{ __('service.txt_goback') }}
                </b>
              </a>
            </div>
            <br />
        </div>
        {{-- <div class="col-sm-6 col-12">
            @foreach ($gallery as $items)
              <div class="services__gallery">
                  <img src="{{$items['image']}}" width="100%" alt="" />
              </div>
            @endforeach
        </div> --}}
    </div>
    @else
      <div class="row">
          <div class="col-sm-6 col-12 services__detail fontSize125rem">
            {!!$data['detail']['th']!!}
            <br />
              <div class="fontSize125rem">
                <a href="{{ URL::to('services') }}">
                  <b>
                    <img src="{{ asset('images/back.svg') }}" class="icoNavbar" /> {{ __('service.txt_goback') }}
                  </b>
                </a>
              </div>
              <br />
          </div>
          <div class="col-sm-6 col-12">
              @foreach ($gallery as $items)
                <div class="services__gallery">
                    <img src="{{$items['image']}}" width="100%" alt="" />
                </div>
              @endforeach
          </div>
      </div>
    @endif

</div>

@stop