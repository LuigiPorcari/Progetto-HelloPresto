<nav class="navbar navbar-expand-lg fixed-top bg-form-card border-nav">
    <div class="container-fluid">
        <img src="https://img.icons8.com/?size=100&id=18107&format=png&color=000000" alt=""
            class="img-fluid icon-navbar me-2 py-1">
        <a class="navbar-brand font-title  " href="{{ route('home') }}">HelloPresto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">{{__('ui.home')}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{__('ui.foodBoxes')}}
                    </a>
                    <ul class="dropdown-menu bg-form-card">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('categoryShow', compact('category')) }}">
                                {{ __("ui.$category->name") }}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endforeach
                        <li><a class="dropdown-item" href="{{route('foodbox.index')}}">
                            {{__('ui.tuttelefood')}}</a></li>
                    <li>
                    </ul>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('ui.languageSelect')}}
                        </a>
                    <ul class="dropdown-menu justify-content-between bg-form-card">
                        <li><a class="dropdown-item" href=""><x-_locale lang="it" language="ITA" /></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href=""><x-_locale lang="en" language="ENG" /></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href=""><x-_locale lang="ja" language="日本語" /></a></li>
                    </ul>
                </li>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{__('ui.foodProvider')}}</a>
                    </li>
                @endguest
                @auth

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{__('ui.hello')}} {{ Auth::user()->name }}!
                        </a>
                        <ul class="dropdown-menu bg-form-card">
                            <li><a class="dropdown-item" href="{{ route('FoodBox.create') }}">{{__('ui.AggiungiFood')}}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">
                                @csrf
                            </form>
                            <li><a class="dropdown-item" href="{{ route('user.destroy') }}"
                                onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();">{{__('ui.EliminaUtente')}}</a>
                        </li>
                        <form action="{{ route('user.destroy') }}" method="POST" id="delete-form" class="d-none">
                            @csrf
                            @method('delete')
                        </form>
                        </ul>
                    </li>
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item position-relative">
                            <a class="nav-link btn btn-outline-success btn-sm w-sm-25"
                                href="{{ route('revisor.index') }}">{{__('ui.zonaRevisori')}}</a>
                            @if (\App\Models\Foodbox::toBeRevisedCount() != 0)
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ \App\Models\Foodbox::toBeRevisedCount() }}
                                </span>
                            @endif
                        </li>
                    @endif
                @endauth
            </ul>
            @guest
                <button class="btn btn-outline-success p-2">
                    <a class="nav-link" href="{{ route('login') }}"> <i class="fa-solid fa-user"></i>  {{__('ui.accesso')}} </a>
                </button>
            @endguest
            <ul class="navbar-nav">

            </ul>
            <form class="d-flex ms-3 mt-3 mt-md-0" role="search" method="GET" action="{{route('foodbox.search')}}">
                <input name="query" class="form-control me-2" type="search" placeholder="{{__('ui.cerca')}}" aria-label="search">
                <button class="btn btn-outline-success" type="submit" id="basic-addon2"> <i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
</nav>
