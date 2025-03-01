@extends('layouts.jomTemplate')

@section('content')

@include('includes.banner')

<div class="container">
    <div class="row">
        <div class="col-sm-5 col-12 doctor__main2">
            <img src="{{$data['picture']}}?ver=987" class="objectFitcover" height="460" width="100%" />
        </div>
        <div class="col-sm-7 col-12 doctor__main2">
            <h1 class="fontSize3rem colorPrimary">{{$data['name']['th']}}</h1>
            @if(!empty($data['nickname']))
                <h2 class="colorPrimary">( {{$data['nickname']}} )</h2>
            @endif
            @if(!empty($data['license']))
                <label>{{ __('doctor.license') }} : {{$data['license']}}</label>
            @endif
            <hr class="w-100 line">
            <h2 class="colorPrimary">&middot; {{ __('doctor.education') }}</h2>
            <div class="doctor__education">{!! urldecode($data['education']['th']) !!}</div>
        </div>
    </div>
</div>
<div class="doctor__work">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>&middot; {{ __('doctor.work') }}</h2>
                <div class="doctor__work__detail">{!! urldecode($data['work']['th']) !!}</div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 doctor__extension">{!! urldecode($data['extended']['th']) !!}</div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 fontSize125rem text-center">
            <br />
            <br />
            <a href="{{ URL::to('doctor') }}">
              <b>
                <img src="{{ asset('images/back.svg') }}" class="icoNavbar" /> {{ __('doctor.txt_goback') }}
              </b>
            </a>
            <br />
        </div>
    </div>
</div>

@stop