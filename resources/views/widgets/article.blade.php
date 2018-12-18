<div class="container list">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @forelse( $articles as $article)
                <div class="media">
                    @if( $article->page_image)
                        <a class="media-left" href=" {{ url($article->slug) }} ">
                            <img alt="{{ $article->slug }}" src="{{ env('QINIU_DOMAIN').$article->page_image }}" data-holder-rendered="true">
                        </a>
                    @endif
                    <div class="media-body">
                        <h6 class="media-heading">
                            <a href="{{ $article->slug }}">
                                {{ $article->title }}
                            </a>
                        </h6>
                        <div class="mate">
                            <span class="cinme">{{ $article->subtitle }}</span>
                        </div>
                        <div class="description">
                            {{ $article->mate_description }}
                        </div>
                        <div class="extra">
                            @foreach($article->tags as $tag)
                                <a href="{{ url('tag',['tag'=>$tag->tag]) }}">
                                    <div class="label"><i class="ion-pricetag"></i>{{ $tag->tag }}</div>
                                </a>
                            @endforeach
                            <div class="info">
                                <i class="ion-person"></i>{{ $article->user->name or '无名' }}
                                <i class="ion-clock"></i>{{ $article->published_at}}
                                <i class="ion-ios-eye"></i>{{ $article->view_count }}
                                <a href="{{ url($article->slug) }}" class="pull-right">
                                    查看更多 <i class="ion-ios-arrow-forward"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">暂无文章，请联系 <strong>buqiuwenda@foxmail.com</strong></h3>
            @endforelse
        </div>
    </div>
</div>