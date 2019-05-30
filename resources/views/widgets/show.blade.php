<div class="panel panel-default">
    <article class="vc-blog">
        <h1 class="article vc-blog-title">{{ $article->title }}</h1>
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
        <div class="footing">
            <div data-title="{{ $article->title }}" data-description="{{ $article->subtitle }}" data-sites="wechat" data-mobile-sites="wechat" initialized class="social-share share-component">
                <a class="social-share-icon icon-wechat" href="javascript:">
                    <div class="wechat-qrcode">
                        <h4>微信扫一扫：分享</h4>
                        <div class="qrcode" title="{{url($article->slug)}}"></div>
                        <div class="help">
                            <p>微信里点“发现”，扫一下</p>
                            <p>二维码便可将本文分享至朋友圈。</p>
                        </div>
                    </div>

                </a>
            </div>
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

@section('scripts')
    <script src="{{ asset('js/jquery.qrcode.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            var text = "{{ url($article->slug) }}";
            $(".qrcode").qrcode({width:100, height:100, text: text});
        })
    </script>

@endsection