<footer id="footer" class="footer">
    <div class="container text-center">
        <div class="row content">
            <div class="col-md-4 offset-md-4">
                <ul class="connect">
                    <li class="mx-2">
                        <a href="{{ url('/') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    @if(config('blog.footer.github.open'))
                        <li class="mx-2">
                            <a href="{{ config('blog.footer.github.url') }}" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                    @endif

                </ul>
                <div class="links">
                    <a href="#">友情链接</a>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right text-center">
        <span> <strong>Copyright</strong> {!! config('blog.footer.meta') !!} {!! config('blog.footer.icpno') !!}</span>
    </div>
</footer>
