<section id="comments">
    <p class="alert alert-warning font-weight-normal">登录后才能进行评论，<a href="{{ route('login') }}">立即登录</a></p>
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