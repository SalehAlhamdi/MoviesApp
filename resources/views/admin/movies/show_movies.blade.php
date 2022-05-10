@extends('admin.layouts.main')

@section('title')
    عرض جميع الافلام
@endsection

@section('pageName')
    عرض جميع الافلام
@endsection

@section('content')

    @if(session()->has('movie_deleted'))
        <div class="container text-center my-3">
            <p class="btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">{{session()->get('movie_deleted')}}</span>
            </p>
        </div>
    @endif

    @if($movies->count()>0)
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">الجدول</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header bg-dark py-3">
                <h6 class="m-0 font-weight-bold text-primary text-light text-center ">جدول جميع الافلام</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>أسم الفيلم</th>
                            <th>صورة الفيلم</th>
                            <th>قصة الفيلم</th>
                            <th>تاريخ النشر</th>
                            <th>نوع الفيلم</th>
                            <th>العمليات</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($movies as $movie)
                            <tr class="text-center">
                                <td>{{$movie->title}}</td>
                                <td>  <img class=" card-img " src="{{asset('images')}}/{{$movie->imgPath}}" width="200px"> </td>
                                <td>{{$movie->description}}</td>
                                <td>{{$movie->releaseDate}}</td>
                                <td>
                                    @foreach($movie->genres as $genre)
                                        {{$genre->name}}
                                    @endforeach
                                </td>
                                <td>
                                    <div>

                                        <a href="{{route('dashboard.movie.info',$movie->id)}}"
                                           class="btn btn-info btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                            <span class="text" role="button">عرض الفيلم</span>
                                        </a>

                                        <hr>

                                        <a href="{{route('dashboard.movie.update',$movie->id)}}"
                                           class="btn btn-warning btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                            <span class="text" role="button">تعديل الفيلم</span>
                                        </a>

                                        <hr>

                                        <a href="{{route('dashboard.delete_movie',$movie->id)}}" onclick="event.preventDefault();
                                            document.getElementById('delete-form-{{ $movie->id }}').submit();"
                                           class="btn btn-danger btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            <span class="text" role="button">حذف الفيلم</span>
                                        </a>

                                        <form id="delete-form-{{ $movie->id }}" action="{{ route('dashboard.delete_movie',$movie->id) }}"
                                              method="POST" style="display: none;">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h3 mb-2 text-gray-800 text-center">لايوجد افلام حالياً</h1>
            </div>
            <div class="card-body">
            </div>
        </div>
    @endif


@endsection
