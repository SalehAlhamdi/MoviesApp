@extends('layouts.movie_layout')
@section('title')
      موفيز ابب
@endsection
@section('content')

    <!--
          - #HERO
        -->

    <section class="hero">
        <div class="container">

            <div class="hero-content">

                <p class="hero-subtitle">MoviesApp</p>

                <h1 class="h1 hero-title">
                     افلام
                    ,مسلسلات, انميات و<strong>المزيد</strong>
                </h1>

                <div class="meta-wrapper">

                    <div class="badge-wrapper">
                        <div class="badge badge-fill">PG 18</div>

                        <div class="badge badge-outline">الجودة 720</div>
                    </div>

                    <div class="ganre-wrapper">
                        <a href="#">رومانسي,</a>

                        <a href="#">دراما</a>
                    </div>

                    <div class="date-time">

                        <div>
                            <ion-icon name="calendar-outline"></ion-icon>

                            <time datetime="2022">2022</time>
                        </div>

                        <div>
                            <ion-icon name="time-outline"></ion-icon>

                            <time datetime="PT128M">128 min</time>
                        </div>

                    </div>

                </div>

                <button class="btn btn-primary">
                    <ion-icon name="play"></ion-icon>

                    <span>المشاهدة الان</span>
                </button>

            </div>

        </div>
    </section>





    <!--
      - #UPCOMING
    -->

    <section class="upcoming">
        <div class="container">

            <div class="flex-wrapper">

                <div class="title-wrapper">
                    <p class="section-subtitle">يعرض الأن</p>

                    <h2 class="h2 section-title">الافلام الحديثة</h2>
                </div>

                <ul class="filter-list">

                    <li>
                        <a href="{{route('all.movies')}}" class="filter-btn">افلام</a>
                    </li>

                    <li>
                        <button class="filter-btn">مسلسلات</button>
                    </li>

                    <li>
                        <button class="filter-btn">انميات</button>
                    </li>

                </ul>

            </div>

            <ul class="movies-list  has-scrollbar">

                @if(count($recentMovies)>5)

                    @foreach($recentMovies as $recentMovie)
                        <li>
                            <div class="movie-card">
                                <a href="{{route('movie.details',$recentMovie->id)}}">
                                    <figure class="card-banner">
                                        <img src="{{asset('images/movies')}}/{{$recentMovie->imgPath}}" alt="{{$recentMovie->title}}">
                                    </figure>
                                </a>

                                <div class="title-wrapper">
                                    <a href="#">
                                        <h3 class="card-title">{{$recentMovie->title}}</h3>
                                    </a>

                                    <time datetime="2022">{{$recentMovie->releaseDate}}</time>
                                </div>

                                <div class="card-meta">
                                    <div class="badge badge-outline">الجودة {{getResolution('videos/movies/'.$recentMovie->movPath)}}</div>

                                    <div class="duration">
                                        <ion-icon name="time-outline"></ion-icon>

                                        <time datetime="PT137M">{{getDuration('videos/movies/'.$recentMovie->movPath)}} min</time>
                                    </div>

                                    <div class="rating">
                                        <ion-icon name="star"></ion-icon>

                                        <data>N/A</data>
                                    </div>
                                </div>

                            </div>
                        </li>

                    @endforeach
                @endif
            </ul>
        </div>
    </section>





    <!--
      - #SERVICE
    -->



    <!--
      - #TOP RATED
    -->

    <section class="top-rated">
        <div class="container">

            <p class="section-subtitle">يعرض حالياً</p>

            <h2 class="h2 section-title">الافلام</h2>

            <ul class="filter-list">

                <li>
                    <a href="{{route('main_page')}}" class="filter-btn">الرئيسية</a>
                </li>
                <li>
                    <a href="{{route('all.movies')}}" class="filter-btn">الافلام</a>
                </li>

                <li>
                    <a href="{{route('all.tvShows')}}" class="filter-btn">المسلسلات</a>
                </li>

                <li>
                    <button class="filter-btn">الانميات</button>
                </li>


            </ul>

            <ul class="movies-list">
                @foreach($movies as $movie)
                    <li>
                        <div class="movie-card">

                            <a href="{{route('movie.details',$movie->id)}}">

                                <figure class="card-banner">
                                    <img src="{{asset('images/movies')}}/{{$movie->imgPath}}" alt="{{$movie->title}}">
                                </figure>
                            </a>

                            <div class="title-wrapper">
                                <a href="{{route('movie.details',$movie->id)}}">
                                    <h3 class="card-title">{{$movie->title}}</h3>
                                </a>

                                <time datetime="{{$movie->releaseDate}}">{{$movie->releaseDate}}</time>
                            </div>

                            <div class="card-meta">
                                <div class="badge badge-outline">الجودة {{getResolution('videos/movies/'.$movie->movPath)}}</div>

                                <div class="duration">
                                    <ion-icon name="time-outline"></ion-icon>

                                    <time datetime="PT122M">{{getDuration('videos/movies/'.$movie->movPath)}} min</time>
                                </div>

                                <div class="rating">
                                    <ion-icon name="star"></ion-icon>

                                    <data>N/A</data>
                                </div>
                            </div>

                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </section>





    <!--
      - #TV SERIES
    -->

    <section class="tv-series">
        <div class="container">

            <p class="section-subtitle">يعرض حالياً</p>

            <h2 class="h2 section-title">أحدث المسلسلات</h2>

            <ul class="movies-list">

                @foreach($tvShows as $tvShow)

                <li>
                    <div class="movie-card">

                        <a href="{{route('tvShow.details',$tvShow->id)}}">
                            <figure class="card-banner">
                                <img src="{{asset('images/tvShows')}}/{{$tvShow->imgPath}}" alt="{{$tvShow->title}}">
                            </figure>
                        </a>

                        <div class="title-wrapper">
                            <a href="{{route('tvShow.details',$tvShow->id)}}">
                                <h3 class="card-title">{{$tvShow->title}}</h3>
                            </a>

                        </div>

                        <div class="card-meta">
                            <div class="badge badge-outline">720 الجودة</div>

                            <div class="duration">
                                <data>{{'الموسم  '.$tvShow->season}}</data>
                            </div>

                            <div class="rating">
                                <data>الحلقات {{count($tvShow->episodes)}}</data>
                                <ion-icon name="tv-outline"></ion-icon>

                            </div>
                        </div>

                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    </section>
@endsection
