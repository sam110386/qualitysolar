<header class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid p-0">
            <a class="navbar-brand d-lg-none" href="/"><img src="/img/logo.png" alt="" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item"><a class="nav-link" href="/compare" title="Compare">Compare</a></li>
                    <li class="nav-item"><a class="nav-link" href="/save-tax" title="Save">Save</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://blog.vehya.com" title="Blog" target="_blank">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about-us" title="About">About</a></li>
                </ul>
                <a class="navbar-brand m-auto d-none d-lg-inline-block" href="/"><img src="/img/logo.png" alt="" /></a>
                <ul class="navbar-nav justify-content-end">
                    <!-- Authentication Links -->
                    <!--
                    @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    -->
                    <!-- li class="nav-item">
                        <a href="/quote" type="button" class="btn">GET A QUOTE</a>
                    </li -->
                    <a href="/quote" type="button" class="btn">GET A QUOTE</a>
                </ul>
            </div>
        </div>
    </nav>
</header>