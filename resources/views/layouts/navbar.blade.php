<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{url('/')}}">
                {{config("app.name")}}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">文章</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Search -->
                <li>
                    <form class="navbar-form navbar-right search " method="get" role="search" action="{{ url('search') }}">
                        <input type="text" name="q" class="form-control" placeholder="搜索" required>
                    </form>
                </li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                   <li><a href="{{ url('login') }}">登录</a></li>
                   <li><a href="{{ url('register') }}">注册</a></li>
                @else
                  <li class="notification">
                      <a href="{{ url('user/notification') }}"><i class="ion-android-notifications">
                              <span class="new"
                                  @if (Auth::user()->unreadNotifications->count()>0)
                                      style='display:block;'
                                   @endif
                              ></span>
                          </i></a>
                  </li>
                   <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           {{Auth::user()->nickanme ?: Auth::user()->name}}
                           <b class="caret"></b>
                           <img class="avatar img-circle" src="{{ Auth::user()->avatar }}">
                       </a>
                       <ul class="dropdown-menu text-center" role="menu">
                           <li><a href="{{ url('user',['name'=>Auth::user()->name]) }}"><i class="ion-person"></i>个人中心</a></li>
                           <li><a href="{{ url('setting') }}"><i class="ion-gear-b"></i>设置</a></li>
                           @if (Auth::user()->is_admin)
                                <li><a href="{{ url('dashboard/home') }}"><i class="ion-ios-speedometer"></i>控制台</a></li>
                           @endif
                           <li class="divider"></li>
                           <li>
                               <a href="{{ url('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                   <i class="ion-log-out"></i>
                                  退出
                               </a>
                               <form id="logout-form" method="POST" action="{{ url('logout') }}" style="display:none;">
                                   {{ csrf_field() }}
                               </form>
                           </li>
                       </ul>
                   </li>
                @endif
            </ul>
        </div>
    </div>
</nav>