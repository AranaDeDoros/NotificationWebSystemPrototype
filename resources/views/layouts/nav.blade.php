        <nav class="navbar navbar-expand-md navbar-light bg-navbar shadow-sm">
            <div class="container">
                <a id="logoName" class="navbar-brand" href="{{ url('/') }}">
                   <span> {{ config('app.name') }} </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('notifications.all') }}">
                                <i class="fi-xwluxl-bell-wide"></i>Notifications</a>
                            </li>   

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('groups.all') }}">
                                <i class="fi-xnsuxl-team-solid"></i>Groups</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.all') }}">
                                <i class="fi-xnsuxl-users-cog"></i>Users</a>
                            </li>      

                        @endguest
                        @guest
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fi-xnsuxl-user-solid"></i>{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                    <i class="fi-xwsuxl-sign-in-solid"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fi-ctldxl-sign-out-solid"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>