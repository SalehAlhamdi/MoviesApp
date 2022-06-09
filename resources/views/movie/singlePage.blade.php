@extends('layouts.movie_layout')

@if(Route::is('all.movies'))
@section('title')
    الأفلام
@endsection
@elseif(Route::is('all.tvShows'))
@section('title')
    المسلسلات
@endsection
@elseif(Route::is('all.animes'))
@section('title')
    انميات
@endsection
@endif

@section('content')
@if(Route::is('all.movies'))
        <section class="top-rated">
            <div class="container">

                <h2 class="h2 section-title">الافلام</h2>

                <ul class="movies-list">
                    @foreach($movies as $movie)
                        <li>
                            <div class="movie-card">

                                <a href="{{route('movie.details',$movie->id)}}">
                                    <figure class="card-banner">
                                        <img src="{{asset('images/movies/')}}/{{$movie->imgPath}}" alt="{{$movie->title}}">
                                    </figure>
                                </a>

                                <div class="title-wrapper">
                                    <a href="{{route('movie.details',$movie->id)}}">
                                        <h3 class="card-title">{{$movie->title}}</h3>
                                    </a>

                                    <time datetime="2022">{{$movie->releaseDate}}</time>
                                </div>

                                <div class="card-meta">
                                    <div class="badge badge-outline">{{getResolution('videos/movies/'.$movie->movPath)}} الجودة</div>
                                    <div class="badge badge-outline">{{$movie->types[0]->name}}</div>

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

                    {!! $movies->links() !!}
            </div>
        </section>
    @elseif(Route::is('all.tvShows'))
        <section class="top-rated">
            <div class="container">

                <h2 class="h2 section-title">المسلسلات</h2>

                <ul class="movies-list">
                    @foreach($tvShows as $tvShow)
                        <li>
                            <div class="movie-card">

                                <a href="{{route('tvShow.details',$tvShow->id)}}">
                                    <figure class="card-banner">
                                        <img src="{{asset('images/tvShows/')}}/{{$tvShow->imgPath}}" alt="{{$tvShow->title}}">
                                    </figure>
                                </a>

                                <div class="title-wrapper">
                                    <a href="{{route('tvShow.details',$tvShow->id)}}">
                                        <h3 class="card-title">{{$tvShow->title}}</h3>
                                    </a>

                                </div>

                                <div class="card-meta">
                                    <div class="badge badge-outline">الجودة 720</div>
                                    <div class="badge badge-outline">{{$tvShow->types[0]->name}}</div>


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
@elseif(Route::is('all.animes'))
    <section class="top-rated">
        <div class="container">

            <h2 class="h2 section-title">انميات</h2>

            <ul class="movies-list">
                @foreach($tvShows as $tvShow)
                    @if($tvShow->types[0]->name=='انمي')
                        <li>
                            <div class="movie-card">

                                <a href="{{route('tvShow.details',$tvShow->id)}}">
                                    <figure class="card-banner">
                                        <img src="{{asset('images/tvShows/')}}/{{$tvShow->imgPath}}" alt="{{$tvShow->title}}">
                                    </figure>
                                </a>

                                <div class="title-wrapper">
                                    <a href="{{route('tvShow.details',$tvShow->id)}}">
                                        <h3 class="card-title">{{$tvShow->title}}</h3>
                                    </a>

                                </div>

                                <div class="card-meta">
                                    <div class="badge badge-outline">الجودة 720</div>
                                    <div class="badge badge-outline">{{$tvShow->types[0]->name}}</div>


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
                    @endif
                @endforeach
            </ul>

        </div>
    </section>
    @endif
@endsection
