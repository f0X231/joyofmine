@extends('layouts/adminLayout')

@section('title', 'Panorama')

@section('content')

<!-- partial -->
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> @lang('dashboards.pages.panorama.form.title', []) </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/cms/panorama">@lang('dashboards.pages.panorama.form.basecamp.page-main')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboards.pages.panorama.form.basecamp.page-new')</li>
            </ol>
        </nav>
    </div>

    @include('content/form-elements/form-panorama', ['pano' => $pano])
</div> 

@endsection