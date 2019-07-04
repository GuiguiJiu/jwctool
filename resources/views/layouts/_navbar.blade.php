<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="{{ asset('/img/logo.png') }}" alt="Logo"/>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li class="{{ Request::getPathInfo() == '/' ? 'active' : '' }}"><a href="/">主页</a></li>

                @if(Auth::check() && Auth::user()->type == 'Student')
                    <li class="dropdown  {{ in_array(Request::getPathInfo(), ['/score-reports', '/report-analyze']) ? "active" : "" }}">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">成绩查询
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="{{ Request::getPathInfo() == '/score-reports' ? "active" : "" }}">
                                <a href="{{ route('score-reports') }}">成绩报告单</a>
                            </li>
                            <li class="{{ Request::getPathInfo() == '/report-analyze' ? "active" : "" }}">
                                <a href="{{ route('report-analyze') }}">学情分析报告</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::getPathInfo() == '/timetable' ? 'active' : '' }}"><a href="/timetable">所选课程</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::check() ? Auth::user()->name : '登录' }}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu sm" role="menu">
                        <li class="dropdown-content">
                            @can('manage_students')
                                <a href="{{ url(config('administrator.uri')) }}">
                                    管理后台
                                </a>
                            @endcan
                            <a href="/profile">
                                个人信息
                            </a>
                            <a href="/password/update">
                                修改密码
                            </a>
                            <a href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                注销
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li><a href="{{ route('login') }}">登录</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
