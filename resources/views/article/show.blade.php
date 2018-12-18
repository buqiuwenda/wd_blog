@extends('layouts.app')

@section('title',$article->title)

@section('content')
    @component('layouts.header')
        <h1>{{ config('blog.article.title') }}</h1>
        <span class="subheading">{{ config('blog.article.description') }}</span>

        <div class="header">
            <i class="ion-person">{{ $article->user->name or 'null' }}</i>
            @if(count($article->tags))
            <i class="ion-pricetag"></i>
                @foreach($article->tags as $tag)
                    <a href="{{ url('tag',['tag'=>$tag->tag]) }}">{{ $tag->tag }}</a>
                @endforeach
            @endif
        </div>
    @endcomponent

    <div class="article container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <parse content="{{ $article->content['raw'] }}"></parse>
                @if($article->is_original)
                    <div class="publishing alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {!! config('blog.license') !!}
                    </div>
                @endif
                @if(config('blog.social_share.article_share'))
                    <div class="footing">
                        <div class="social-share"
                             data-title="{{ $article->title }}"
                             data-description="{{ $article->title }}"
                             {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }}
                             {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }}
                             initialized></div>
                    </div>
                @endif
            </div>
        </div>

    </div>

    @if(Auth::guest())
        <comment title="评论"
                 commentable-type="articles"
                 commentable-id="{{ $article->id }}"></comment>
    @else
        <comment title="评论"
                 username="{{ Auth::user()->name }}"
                 user-avatar="{{ Auth::user()->avatar }}"
                 commentable-type="articles"
                 commentable-id="{{ $article->id }}"
                 can-comment></comment>
    @endif
@endsection


@section('scripts')

@endsection


