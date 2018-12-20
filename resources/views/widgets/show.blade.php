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
            @if($article->is_original)
                {!! config('blog.license') !!} <strong class="text-danger"> （{{ env('APP_URL') }}）</strong>
            @endif
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

<section id="comments">
    <h3 class="vc-comments-title">{{$article->title}} - 有{{ $comments->count() }}条评论</h3>
    @forelse($comments as $comment)
        <ol class="commentlist">
            <li class="comment even thread-even depth-1 parent" id="comment-1">
                <div id="div-comment-1" class="comment-body">
                    <div class="comment-author vcard">
                        <img alt="" src="{{ $comment->user->avatar }}"  class="avatar avatar-50 photo avatar-default" height="50" width="50"> <cite class="fn">
                            <a href="#" rel="external nofollow" class="url">{{ $comment->user->name }}</a></cite>

                        <time>{{ $comment->created_at }}</time>
                    </div>

                    <p>{{ $comment->content }}

                    </p>
                </div>
            </li>
            <!-- #comment-## -->
        </ol>
    @empty
        <br>
    @endforelse


    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title">发表评论 </h3>
        <form action="{{ url('comments') }}" method="post" id="commentform" class="comment-form">
            {{ csrf_field() }}
            <p class="comment-form-comment">
                <label for="comment">评论</label>
                <textarea id="comment" name="content" rows="5" aria-describedby="form-allowed-tags" aria-required="true" required="required"></textarea>
            </p>
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" class="submit" value="发布评论">
                <input type="hidden" name="commentable_id" value="{{ $article->id }}" >
                <input type="hidden" name="commentable_type" value="articles">
                <input type="hidden" name="slug" value="{{ $article->slug }}">
            </p>
        </form>
    </div>
</section>