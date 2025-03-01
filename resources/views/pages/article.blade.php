@extends('layouts.jomTemplate')

@section('content')

<div class="container">
    <div class="row article__main__article">
        <div class="col-sm-6 col-12">
            <h1 class="colorPrimary">{{ __('article.title') }}</h1>
        </div>
        <div class="col-sm-6 col-12 text-right">
            <label class="sortTxt fontSize15rem colorPrimary">{{ __('article.orderby') }}</label>
            <select>
                <option value="orderby_1v">{{ __('article.orderby_1') }}</option>
            </select>
        </div>
        <div class="col-12">
            <hr class="lineFull" />
        </div>
    </div>
    <div class="row">
        @foreach ($data as $item)
            <div class="col-sm-6 col-12">
                <a href="{{$item['slug']['th']}}">
                    <div class="artical__item">
                        <img src="{{$item['thumbnail']['th']}}" width="100%" />
                        <p>{{$item['title']['th']}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    @if($pagelase > 1)
        <br />
        <div class="row">
            <div class="col-12 text-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="?page=1">First</a>
                    </li>
                    @if($page2prev > 0)
                        <li class="page-item"><a class="page-link" href="?page={{$page2prev}}">{{$page2prev}}</a></li>
                    @endif
                    @if($pageprev > 0)
                        <li class="page-item"><a class="page-link" href="?page={{$pageprev}}">{{$pageprev}}</a></li>
                    @endif
                    @if($pagecurrent > 0)
                        <li class="page-item"><a class="page-link" href="?page={{$pagecurrent}}">{{$pagecurrent}}</a></li>
                    @endif
                    @if($pagenext > 0)
                        <li class="page-item"><a class="page-link" href="?page={{$pagenext}}">{{$pagenext}}</a></li>
                    @endif
                    @if($page2next > 0)
                        <li class="page-item"><a class="page-link" href="?page={{$page2next}}">{{$page2next}}</a></li>
                    @endif
                    <li class="page-item">
                        <a class="page-link" href="?page={{$pagelase}}">Last</a>
                    </li>
                    </ul>
                </nav>
            </div>
        </div>
        <br />
    @endif
</div>

@stop