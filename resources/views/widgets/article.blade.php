
        <div class=" col-sm-8">
            @if(request()->get('q'))
            <div class="well well-sm text-center">
               {{request()->get('q')}}
            </div>
            @endif
            @forelse($articles as $article)
            <div class="thumbnail">
                <div class="">
                    <a href=""><img src="{{ env('QINIU_DOMAIN').$article->page_image }}" alt="{{ $article->slug }}">
                    </a>
                </div>
                <div class="caption">
                    <h2 class="vc-page-title"><a href="{{ url($article->slug) }}">{{ $article->title }}</a></h2>
                    <p class="vc-author-info">
                        <time>{{ $article->published_at }}</time> &bull; <span> {{ $article->member->name or '无名' }}</span> &bull; <span><i class="fas fa-eye "> {{ $article->view_count }}</i></span>
                    </p>
                    <p class="form-control-static " style="font-size:14px;">{{$article->meta_description }}</p>
                    <p class="clearfix">
                        <a class="hidden-xs pull-right vc-more-link" href="{{ url($article->slug) }}" role="button">继续阅读 &raquo;</a>
                        <span class="vc-tags">
                             @foreach($article->tags as $tag)
                                <a href="{{ url('tag', ['tag' => $tag->tag]) }}">
                                  {{ $tag->tag }}
                               </a>
                            @endforeach
                        </span>
                    </p>
                </div>
            </div>
            @empty
                <h3 class="text-center">暂未文章，请联系站长</h3>
            @endforelse

            {{ $articles->links('pagination.default') }}

        </div>

