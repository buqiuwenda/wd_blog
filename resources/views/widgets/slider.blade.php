<div class=" col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="widget-title panel-title">金牌赞助</h3>
        </div>
        <div class="panel-body">
           @if(env('SPONSOR_URL'))
               <a href="{{ env('SPONSOR_URL') }}">
                 <img class="img-thumbnail" alt="{{ env('SPONSOR_ATL') }}" src="{{ env('SPONSOR_IMG_URL') }}">
               </a>
           @endif
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <form role="search" action="{{ url('search') }}">
                <div class="form-group" style="margin-bottom:0;">
                    <input type="text" name="q" class="form-control" placeholder="善于搜索...">
                </div>
            </form>
        </div>
    </div>

    @forelse($bulletins as $bulletin)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="widget-title panel-title">{{ $bulletin->title }}</h3>
        </div>
        <div class="panel-body">
            <p style="text-indent:2rem;word-break:break-all;font-size:14px">
               {{ $bulletin->context }}
            </p>
        </div>
    </div>
    @empty
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="widget-title panel-title">声明</h3>
        </div>
        <div class="panel-body">
            <p style="text-indent:2rem;word-break:break-all;">
                {{ config('blog.statement') }}
            </p>
        </div>
    </div>
    @endforelse

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="widget-title panel-title">热门浏览</h3>
        </div>
        <div class="panel-body">
            {{--<ul class="list-unstyled" id="many-articles">--}}
                {{--@forelse($lists as $list)--}}
                {{--<li><a href="{{ url($list->slug) }}">{{ $list->title }}</a></li>--}}
                {{--@empty--}}

               {{--@endforelse--}}
                {{--<li class="text-right"><a href="javascript:">更多 >></a></li>--}}
            {{--</ul>--}}

            <div class="list-group">
                @forelse($lists as $list)
                <a rel="bookmark" class="list-group-item kb-list-date kb-post-list" href="{{ url($list->slug) }}">
                    <span class="badge">{{ $list->view_count }}</span>
                    <h5>
                        <span class="glyphicon ipt-icon-file"></span>
                        {{ $list->title }}
                    </h5>
                    <span class="clearfix"></span>
                </a>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</div>
