<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset("movie/assets/images/icon.png")}}" type="image/png">
    <title>CineFlix</title>

    <!--
      - custom css link
    -->
    <link rel="stylesheet" href="{{asset("movie/assets/css/main.css")}}">
    <link rel="stylesheet" href="{{asset("movie/assets/css/media_query.css")}}">

    <!--
      - google font link
    -->
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>

<body>




<!--
  - main container
-->
<div class="container">

    <!--
      - #HEADER SECTION
    -->

    <header class="">
        <div class="navbar">

            <!--
              - menu button for small screen
            -->
            <button class="navbar-menu-btn">
                <span class="one"></span>
                <span class="two"></span>
                <span class="three"></span>
            </button>


            <a href="#" class="navbar-brand">
                <img src="{{asset("movie/assets/images/logo.png")}}" alt="">
            </a>

            <!--
              - navbar navigation
            -->

            <nav class="">
                <ul class="navbar-nav">

                    <li> <a href="#" class="navbar-link">الرئيسية</a> </li>
                    <li> <a href="#category" class="navbar-link">الأنواع</a> </li>

                </ul>
            </nav>

            <!--
              - search and sign-in
            -->

            <div class="navbar-actions">

                <form action="#" class="navbar-form">
                    <input type="text" name="search" placeholder="... البحث عن" class="navbar-form-search">

                    <button class="navbar-form-btn">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>

                    <button class="navbar-form-close">
                        <ion-icon name="close-circle-outline"></ion-icon>
                    </button>
                </form>


                <!--
                  - search button for small screen
                -->

                <button class="navbar-search-btn">
                    <ion-icon name="search-outline"></ion-icon>
                </button>

                <a href="{{route('login')}}" class="navbar-signin">
                    <span>تسجيل الدخول</span>
                    <ion-icon name="log-in-outline"></ion-icon>
                </a>

            </div>

        </div>
    </header>





    <!--
      - MAIN SECTION
    -->
    <main>

        <!--
          - #BANNER SECTION
        -->
        <section class="banner">
            <div class="banner-card">

                <img src="{{asset("images/movies")}}/{{$movies[count($movies)-1]->imgPath}}" class="banner-img" alt="">

                <div class="card-content">
                    <div class="card-info">

                        <div class="genre">
                            <ion-icon name="film"></ion-icon>
                            <span>
                                @foreach($movies[count($movies)-1]->genres as $genre)
                                    {{$genre->name}}
                                @endforeach
                            </span>
                        </div>

                        <div class="year">
                            <ion-icon name="calendar"></ion-icon>
                            <span>2019</span>
                        </div>

                        <div class="duration">
                            <ion-icon name="time"></ion-icon>
                            <span>2h 11m</span>
                        </div>

                        <div class="quality">4K</div>

                    </div>

                    <h2 class="card-title">John Wick: Chapter 3 - Parabellum</h2>
                </div>

            </div>
        </section>





        <!--
          - #MOVIES SECTION
        -->
        <section class="movies">

            <!--
              - filter bar
            -->
            <div class="filter-bar">

                <div class="filter-dropdowns">

                    <select name="genre" class="genre">
                        <option value="all genres">جميع الانواع</option>
                        @foreach($genres as $genre)
                            <option value="action">{{$genre->name}}</option>
                        @endforeach
                    </select>
                    <select name="year" class="year">
                        <option value="all years">كل السنين</option>
                        @foreach($years as $year)
                                <option value="{{$year}}">
                                    {{$year}}
                                </option>
                        @endforeach
                    </select>

                </div>

                <div class="filter-radios">

                    <input type="radio" name="grade" id="featured" checked>
                    <label for="featured">Featured</label>

                    <input type="radio" name="grade" id="popular">
                    <label for="popular">Popular</label>

                    <input type="radio" name="grade" id="newest">
                    <label for="newest">Newest</label>

                    <div class="checked-radio-bg"></div>

                </div>

            </div>


            <!--
              - movies grid
            -->

            <div class="movies-grid">
                @foreach($movies as $movie)

                    <div class="movie-card">

                        <div class="card-head">
                            <img src="{{asset("images/movies")}}/{{$movie->imgPath}}" alt="" class="card-img">

                            <div class="card-overlay">

                                <div class="bookmark">
                                    <ion-icon name="bookmark-outline"></ion-icon>
                                </div>

                                <div class="rating">
                                    <ion-icon name="star-outline"></ion-icon>
                                    <span>6.8</span>
                                </div>

                                <div class="play">
                                    <ion-icon name="play-circle-outline"></ion-icon>
                                </div>

                            </div>
                        </div>

                        <div class="card-body">
                            <h3 class="card-title">{{$movie->title}}</h3>

                            <div class="card-info">
                                <span class="genre" style="font-size: 15px">
                                    @foreach($movie->genres as $genres)
                                    {{$genres->name}}
                                    @endforeach
                                </span>
                                <span class="year">2019</span>
                            </div>
                        </div>

                    </div>

                @endforeach

            </div>

            <!--
              - load more button
            -->
            <button class="load-more">LOAD MORE</button>

        </section>





        <!--
          - #CATEGORY SECTION
        -->
        <section class="category" id="category">

            <h2 class="section-heading">Category</h2>

            <div class="category-grid">

                <div class="category-card">
                    <img src="{{asset("movie/assets/images/action.jpg")}}" alt="" class="card-img">
                    <div class="name">Action</div>
                    <div class="total">100</div>
                </div>

                <div class="category-card">
                    <img src="{{asset("movie/assets/images/comedy.jpg")}}" alt="" class="card-img">
                    <div class="name">Comedy</div>
                    <div class="total">50</div>
                </div>

                <div class="category-card">
                    <img src="{{asset("movie/assets/images/thriller.webp")}}" alt="" class="card-img">
                    <div class="name">Thriller</div>
                    <div class="total">20</div>
                </div>

                <div class="category-card">
                    <img src="{{asset("movie/assets/images/horror.jpg")}}" alt="" class="card-img">
                    <div class="name">Horror</div>
                    <div class="total">80</div>
                </div>

                <div class="category-card">
                    <img src={{asset("movie/assets/images/adventure.jpg")}} alt="" class="card-img">
                    <div class="name">Adventure</div>
                    <div class="total">100</div>
                </div>

                <div class="category-card">
                    <img src="{{asset("movie/assets/images/animated.jpg")}}" alt="" class="card-img">
                    <div class="name">Animated</div>
                    <div class="total">50</div>
                </div>

                <div class="category-card">
                    <img src={{asset("movie/assets/images/crime.jpg")}} alt="" class="card-img">
                    <div class="name">Crime</div>
                    <div class="total">20</div>
                </div>

                <div class="category-card">
                    <img src={{asset("movie/assets/images/sci-fi.jpg")}} alt="" class="card-img">
                    <div class="name">SCI-FI</div>
                    <div class="total">80</div>
                </div>

            </div>

        </section>





        <!--
          - #LIVE SECTION
        -->
        <section class="live" id="live">

            <h2 class="section-heading">Live Tv Shows</h2>

            <div class="live-grid">

                <div class="live-card">

                    <div class="card-head">
                        <img src={{asset("movie/assets/images/planet.jpg")}} alt="" class="card-img">
                        <div class="live-badge">LIVE</div>
                        <div class="total-viewers">305K viewers</div>
                        <div class="play">
                            <ion-icon name="play-circle-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="card-body">
                        <img src={{asset("movie/assets/images/bbcamerica.jpg")}} alt="" class="avatar">
                        <h3 class="card-title">Planet Earth II <br> Season 1 - Islands</h3>
                    </div>

                </div>

                <div class="live-card">

                    <div class="card-head">
                        <img src={{asset("movie/assets/images/got.jpg")}} alt="" class="card-img">
                        <div class="live-badge">LIVE</div>
                        <div class="total-viewers">1.7M viewers</div>
                        <div class="play">
                            <ion-icon name="play-circle-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="card-body">
                        <img src={{asset("movie/assets/images/HBO-Logo-square.jpg")}} alt="" class="avatar">
                        <h3 class="card-title">Game of Thrones <br> Season 5 - Mother's Mercy</h3>
                    </div>

                </div>

                <div class="live-card">

                    <div class="card-head">
                        <img src={{asset("movie/assets/images/vikins.jpg")}} alt="" class="card-img">
                        <div class="live-badge">LIVE</div>
                        <div class="total-viewers">468K viewers</div>
                        <div class="play">
                            <ion-icon name="play-circle-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="card-body">
                        <img src={{asset("movie/assets/images/HBO-Logo-square.jpg")}} alt="" class="avatar">
                        <h3 class="card-title">Vikings <br> Season 4 - What Might Have Been</h3>
                    </div>

                </div>

            </div>

        </section>

    </main>





    <!--
      - FOOTER SECTION
    -->
    <footer>

        <div class="footer-content">

            <div class="footer-brand">
                <img src={{asset("movie/assets/images/logo.png")}} alt="" class="footer-logo">
                <p class="slogan">Movies & TV Shows, Online cinema,
                    Movie database HTML Template.</p>


                <div class="social-link">

                    <a href="#">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="logo-tiktok"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="logo-youtube"></ion-icon>
                    </a>

                </div>
            </div>


            <div class="footer-links">
                <ul>

                    <h4 class="link-heading">CineFlix</h4>

                    <li class="link-item"><a href="#">About us</a></li>
                    <li class="link-item"><a href="#">My profile</a></li>
                    <li class="link-item"><a href="#">Pricing plans</a></li>
                    <li class="link-item"><a href="#">Contacts</a></li>

                </ul>

                <ul>

                    <h4 class="link-heading">Browse</h4>

                    <li class="link-item"><a href="#">Live Tv</a></li>
                    <li class="link-item"><a href="#">Live News</a></li>
                    <li class="link-item"><a href="#">Live Sports</a></li>
                    <li class="link-item"><a href="#">Streaming Library</a></li>

                </ul>

                <ul>

                    <li class="link-item"><a href="#">TV Shows</a></li>
                    <li class="link-item"><a href="#">Movies</a></li>
                    <li class="link-item"><a href="#">Kids</a></li>
                    <li class="link-item"><a href="#">Collections</a></li>

                </ul>

                <ul>

                    <h4 class="link-heading">Help</h4>

                    <li class="link-item"><a href="#">Account & Billing</a></li>
                    <li class="link-item"><a href="#">Plans & Pricing</a></li>
                    <li class="link-item"><a href="#">Supported devices</a></li>
                    <li class="link-item"><a href="#">Accessibility</a></li>

                </ul>
            </div>

        </div>

        <div class="footer-copyright">

            <div class="copyright">
                <p>&copy; copyright 2021 CineFlix</p>
            </div>

            <div class="wrapper">
                <a href="#">Privacy policy</a>
                <a href="#">Terms and conditions</a>
            </div>

        </div>

    </footer>

</div>





<!--
  - custom js link
-->
<script src={{asset("movie/assets/js/main.js")}}></script>

<!--
  - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
