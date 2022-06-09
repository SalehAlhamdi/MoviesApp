@extends('layouts.movie_layout')

@if(Route::is('movie.details'))
@section('title')
    {{$movie->title}}
@endsection
@elseif(Route::is('tvShow.details'))
@section('title')
    {{$tvShow->title}}
@endsection
@endif

@section('content')
    @if(Route::is('movie.details'))
        <section class="movie-detail">
            <div class="container">
                <figure class="movie-detail-banner">
                    <img src="{{asset('images/movies')}}/{{$movie->imgPath}}" alt="{{$movie->title}}">
                    <a href="{{asset('videos/movies')}}/{{$movie->movPath}}" class="play-btn">
                        <ion-icon name="play-circle-outline"></ion-icon>
                    </a>
                </figure>

                <div class="movie-detail-content">

                    <p class="detail-subtitle">!فيلم جديد</p>

                    <h1 class="h1 detail-title">
                        <strong>فيلم</strong> {{$movie->title}}
                    </h1>

                    <div class="meta-wrapper">

                        <div class="badge-wrapper">
                            <div class="badge badge-fill">PG 15</div>

                            <div class="badge badge-outline">{{getResolution('videos/movies/'.$movie->movPath)}}</div>
                        </div>

                        <div class="ganre-wrapper">
                            @foreach($movie->genres as $genre)
                                <a href="#">{{$genre->name}}</a>

                                <a></a>
                            @endforeach
                        </div>

                        <div class="date-time">

                            <div>
                                <ion-icon name="calendar-outline"></ion-icon>

                                <time datetime="{{$movie->releaseDate}}">{{$movie->releaseDate}}</time>
                            </div>

                            <div>
                                <ion-icon name="time-outline"></ion-icon>

                                <time datetime="PT115M">{{getDuration('videos/movies/'.$movie->movPath)}} min</time>
                            </div>

                        </div>

                    </div>

                    <p class="storyline">
                        {{$movie->description}}
                    </p>

                </div>

            </div>
        </section>

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

                    @foreach($movies as $single_movie)
                        <li>
                            <div class="movie-card">

                                <a href="{{route('movie.details',$single_movie->id)}}">

                                    <figure class="card-banner">
                                        <img src="{{asset('images/movies')}}/{{$single_movie->imgPath}}" alt="{{$single_movie->title}}">
                                    </figure>
                                </a>

                                <div class="title-wrapper">
                                    <a href="{{route('movie.details',$single_movie->id)}}">
                                        <h3 class="card-title">{{$single_movie->title}}</h3>
                                    </a>

                                    <time datetime="{{$single_movie->releaseDate}}">{{$single_movie->releaseDate}}</time>
                                </div>

                                <div class="card-meta">
                                    <div class="badge badge-outline">{{getResolution('videos/movies/'.$single_movie->movPath)}}</div>

                                    <div class="duration">
                                        <ion-icon name="time-outline"></ion-icon>

                                        <time datetime="PT122M">{{getDuration('videos/movies/'.$single_movie->movPath)}} min</time>
                                    </div>

                                    <div class="rating">
                                        <ion-icon name="star"></ion-icon>

                                        <data>7.8</data>
                                    </div>
                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
        </section>
        @elseif(Route::is('tvShow.details'))

        <section class="movie-detail" style="background: url("{{asset('images/tvShow')}}/{{$tvShow->imgPath}}">
            <div class="container">

                <figure class="movie-detail-banner">

                    <img src="{{asset('images/tvShows')}}/{{$tvShow->imgPath}}" alt="{{$tvShow->title}}">

                </figure>

                <div class="movie-detail-content">

                    <p class="detail-subtitle">!مسلسل جديد</p>

                    <h1 class="h1 detail-title">
                        <strong>مسلسل </strong> {{$tvShow->title}}
                    </h1>

                    <h1 class="h2 detail-title">
                        <strong>الموسم </strong> {{$tvShow->season}}
                    </h1>

                    <div class="meta-wrapper">

                        <div class="badge-wrapper">
                            <div class="badge badge-fill">الموسم {{$tvShow->season}}</div>

                            <div class="badge badge-outline">720 الجودة</div>
                            <div class="badge badge-outline">{{count($tvShow->episodes)}} الحلقات </div>

                        </div>

                        <div class="ganre-wrapper">
                            @foreach($tvShow->genres as $genre)
                                <a href="#">{{$genre->name}}</a>

                                <a></a>
                            @endforeach
                        </div>


                    </div>

                    <p class="storyline">
                        {{$tvShow->description}}
                    </p>
                    @if((count($tvShow->episodes)>0))
                        @foreach($tvShow->episodes as $episode)
                            <a href="{{asset('videos/tvShows')}}/{{$episode->vidPath}}" class="btn btn-primary d-inline-block"> الحلقة {{$episode->ep_num}}</a>
                        @endforeach
                    @else
                        <h2 class="h2 section-title">
                            لايوجد حلقات حالياً
                        </h2>
                    @endif
                </div>

            </div>
        </section>

        <section class="top-rated">
            <div class="container">

                <p class="section-subtitle">يعرض حالياً</p>

                <h2 class="h2 section-title">المسلسلات</h2>

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
                                    <div class="badge badge-outline">الجودة 720</div>

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

        @endif
@endsection
