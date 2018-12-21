<div class="visible-lg visible-md col-md-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <form role="search" action="{{ url('search') }}">
                <div class="form-group" style="margin-bottom:0;">
                    <input type="text" name="q" class="form-control" placeholder="善于搜索...">
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <h4 class="vc-widget-title">主题声明</h4>
        <div class="panel-body">
            <p style="text-indent:2rem;word-break:break-all;">
                这是一个基于bootstrap框架的主题，是一款私有主题，如果您不小心使用了该主题，请注明版权，禁止商业行为。
            </p>
        </div>
    </div>
    <div class="panel panel-default">
        <h4 class="vc-widget-title">最近更新</h4>
        <div class="panel-body">
            <ul class="list-unstyled" id="many-articles">
                @forelse($lists as $list)
                <li><a href="{{ url($list->slug) }}">{{ $list->title }}</a></li>
                @empty

               @endforelse
                <li class="text-right"><a href="#">更多 >></a></li>
            </ul>
        </div>
    </div>
</div>
