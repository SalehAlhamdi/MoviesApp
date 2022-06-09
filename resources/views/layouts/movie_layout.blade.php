<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!--
      - favicon
    -->
    <link rel="shortcut icon" href="{{asset('movie/assets/favicon.svg')}}" type="image/svg+xml">
    <!--
      - custom css link
    -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('movie/assets/css/style.css')}}">


    <!--
      - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="top">

<!--
  - #HEADER
-->

<header class="header active" data-header>
    <div class="container">

        <div class="overlay" dat    a-overlay></div>


        <div class="header-actions">

            <button class="search-btn">
                <ion-icon name="search-outline"></ion-icon>
            </button>

            <div class="lang-wrapper">
                <label for="language">
                    <ion-icon name="globe-outline"></ion-icon>
                </label>

                <select name="language" id="language">
                    <option value="ar">AR</option>
                </select>
            </div>

            <a href="{{route('login')}}" class="btn btn-primary">تسجيل الدخول</a>

        </div>

        <button class="menu-open-btn" data-menu-open-btn>
            <ion-icon name="reorder-two"></ion-icon>
        </button>

        <nav class="navbar" data-navbar>

            <div class="navbar-top">


                <button class="menu-close-btn" data-menu-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>

            </div>

            <ul class="navbar-list">

                <li>
                    <a href="{{route('main_page')}}" class="navbar-link" @if(Route::is('main_page')) style="color: #e2d703" @endif >الرئيسية</a>
                </li>

                <li>
                    <a href="{{route('all.movies')}}" @if(Route::is('all.movies')||Route::is('movie.details')) style="color: #e2d703" @endif class="navbar-link">الافلام</a>
                </li>

                <li>
                    <a href="{{route('all.tvShows')}}" @if(Route::is('all.tvShows')) style="color: #e2d703" @endif class="navbar-link">المسلسلات</a>
                </li>

                <li>
                    <a href="{{route('all.animes')}}" @if(Route::is('all.animes')) style="color: #e2d703" @endif class="navbar-link">الانميات</a>
                </li>


            </ul>

            <ul class="navbar-social-list">

                <li>
                    <a href="#" class="navbar-social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                        <ion-icon name="logo-pinterest"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                        <ion-icon name="logo-youtube"></ion-icon>
                    </a>
                </li>

            </ul>

        </nav>

    </div>
</header>





<main>
    <article>
        @yield('content')
    </article>
</main>





<!--
  - #FOOTER
-->

<footer class="footer">

    <div class="footer-top">
        <div class="container">

            <div class="footer-brand-wrapper">


                <ul class="footer-list">

                    <li>
                        <a href="{{route('main_page')}}" class="footer-link">الرئيسية</a>
                    </li>

                    <li>
                        <a href="{{route('all.movies')}}" class="footer-link">الافلام</a>
                    </li>

                    <li>
                        <a href="{{route('all.tvShows')}}" class="footer-link">المسلسلات</a>
                    </li>

                    <li>
                        <a href="{{route('all.animes')}}" class="footer-link">انميات</a>
                    </li>

                </ul>

            </div>

            <div class="divider"></div>

            <div class="quicklink-wrapper">


                <ul class="social-list">

                    <li>
                        <a href="https://www.facebook.com/saleh.m.alhamdi/" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.instagram.com/main__zed/" class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.linkedin.com/in/salehalhamdi/" class="social-link">
                            <ion-icon name="logo-linkedin"></ion-icon>
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">

            <p class="copyright">
                &copy; 2022 <a href="#">Saleh Alhamdi</a>. All Rights Reserved
            </p>


        </div>
    </div>

</footer>





<!--
  - #GO TO TOP
-->

<a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
</a>





<!--
  - custom js link
-->
<script src="{{asset('movie/assets/js/script.js')}}"></script>

<!--
  - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script type="javascript" src="{{asset('js/bootstrap.js')}}"></script>

<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
    var vid = document.getElementById("myVideo");

    function myFunction() {
        alert(vid.duration);
    }
</script>
</body>

</html>
