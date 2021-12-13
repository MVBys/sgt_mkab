<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <span style="font-size: 2em; color: rgb(5, 197, 255);">
                <i class="fas fa-graduation-cap"></i>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Документы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Информация</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Материалы
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Учебные</a></li>
                        <li><a class="dropdown-item" href="#">Методические</a></li>
                    </ul>
                </li>

            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5">
               @if (Route::has('login'))

                        @auth
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ url('/teacheroom') }}">Кабинет
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ url('/logout') }}">Выход
                                </a>
                            </li>

                        @else
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('login') }}">Вход</a>
                            </li>
                            @if (Route::has('register'))


                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page"
                                        href="{{ route('register') }}">Регистрация</a>
                                </li>


                            @endif
                        @endauth

                @endif
            </ul>

        </div>



    </div>
</nav>
