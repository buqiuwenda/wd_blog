<header class="masthead" style="background-image: url( {{ asset('images/home-bg.jpg') }})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                   {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</header>
