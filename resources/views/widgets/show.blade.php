<div class="panel panel-default">
    <article class="vc-blog">
        <h1 class="vc-blog-title">{{ $article->title }}</h1>
        <p class="vc-author-info">
            <time>{{ $article->published_at }}</time> &bull; <span> {{ $article->member->name or '无名' }}</span> &bull; <span><i class="fas fa-eye "> {{ $article->view_count }}</i></span>
        </p>
        <div class="vc-blog-content">
            <img src="{{ env('QINIU_DOMAIN').$article->page_image  }}" alt="{{ $article->slug }}">
            {!! $article->content['html'] !!}
        </div>
        <span class="vc-tags">
                     @foreach($article->tags as $tag)
                <a href="{{ url('tag', ['tag' => $tag->tag]) }}">
                                  {{ $tag->tag }}
                               </a>
            @endforeach
          </span>
        <div class="vc-copyright">
            {!! config('blog.license') !!} <strong class="text-danger"> （{{ env('APP_URL') }}）</strong>
        </div>
    </article>
</div>

{{--<nav>--}}
    {{--<ul class="pager">--}}
        {{--<li class="previous"><a href="#"><i class="fa fa-angle-left"></i> 上一篇</a>--}}
        {{--</li>--}}
        {{--<li class="next"><a href="#">下一篇 <i class="fa fa-angle-right"></i></a>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</nav>--}}
@include('widgets.comment')