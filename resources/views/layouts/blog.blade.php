<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edica :: Home</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('assets/vendors/aos/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
</head>
<body>
<header id="header">
    <div class="container">
        <div class="header-content">
            <div class="header-content__logo">
                <a href={{route('main.index')}}>
                    <img class="header-content__logo-img" src="{{asset('assets/images/logo-news.png')}}" alt="">
                </a>
            </div>
            <ul class="header-content__list">
                <li class="header-content__item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle bg-transparent header__menu-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Категории
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach($categories as $category)
                                <li>
                                    <a class="dropdown-item" class="header__menu-link" href="{{route('category.posts.show',$category->id)}}">{{$category->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="header-content__item">
                    <a class="header-content__link" href="#">Свежие новости</a>
                </li>
                <li class="header-content__item">
                    @auth()
                        <a href="{{route('personal.main.index')}}" class="header__menu-link"><i class="fas fa-user"></i> {{auth()->user()->name}}</a>
                @endauth
                @guest()
                    <li class="header__menu-item">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle bg-transparent header__menu-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </button>
                            <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton1">
                                <a href="{{route('personal.login.index')}}" class="header__menu-link">Войти</a>
                                <a href="{{route('personal.register.index')}}" class="header__menu-link">Зарегистрироваться</a>
                            </ul>
                        </div>
                    </li>
                    @endguest
                </li>
            </ul>
            <div class="header-content__contact">
                <li class="header-content__item">
                    <a class="header-content__link" href="#">О нас</a>
                </li>
                <li class="header-content__item">
                    <a class="header-content__link" href="#">Контакты</a>
                </li>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer id="footer">
    <div class="container">
        <div class='footer__info'>
            <div class="footer__contact">
                <p class="footer__contact-email">eeeee@mail.ru</p>
                <p class="footer__contact-number">8-900-900-00-00</p>
                <div>
                    <a href=""></a>
                    <a href=""></a>
                    <a href=""></a>
                    <a href=""></a>
                </div>
            </div>
            <div class="footer__menu">
                    <a href="" class="footer__menu-link">Свежие новости</a>
                    <a href="" class="footer__menu-link">Контакты</a>
                    <a href="" class="footer__menu-link">О нас</a>
            </div>
        </div>

    </div>

</footer>
<script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script><script src="{{asset('assets/vendors/aos/aos.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>

</html>
