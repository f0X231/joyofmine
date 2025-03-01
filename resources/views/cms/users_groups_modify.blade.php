@extends('layouts.adminTemplate')

@section('cmscontent')

<!-- partial -->
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> @lang('cms_default.roles.list.title') </h3>
    </div>

    @include('cms/form/form-groups', [
                                        'title'       => 'Roles Status',
                                        'description' => 'Roles of pages <code>Roles Status</code> in Joy of Minds',
                                        'status_type' => $type,
                                        'allpage'     => $pageall,
                                        'status_page' => $authpage,
                                    ])
</div>

@endsection
