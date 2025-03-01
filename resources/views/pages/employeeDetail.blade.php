@extends('layouts.jomTemplate')

@section('content')

@include('includes.banner')

<div class="container">
    <!-- Content -->
    <div class="row">
        <div class="col-12 services__main2">
            <h1 class="colorPrimary fontSize3rem">{{$data['title']['th']}}</h1>
            <p class="fontSize15rem">{!! $data['description']['th'] !!}</p>
        </div>
    </div>

    @if(isset($data['detail']['th']))
        <div class="row">
            <div class="col-sm-12 col-12 services__detail fontSize125rem">
            {!!$data['detail']['th']!!}
            <br />
                <div class="fontSize125rem">
                <a href="{{ URL::to('employee-program') }}">
                    <b>
                    <img src="{{ asset('images/back.svg') }}" class="icoNavbar" /> {{ __('employee.txt_goback') }}
                    </b>
                </a>
                </div>
                <br />
            </div>
        </div>
    @endif
</div>

@stop