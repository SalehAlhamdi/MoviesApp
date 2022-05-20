@extends('admin.layouts.main')

@section('title')
    عرض جميع الافلام المحذوفة
@endsection

@section('pageName')
    عرض جميع الافلام المحذوفة
@endsection

@section('content')

    @if(session()->has('movie_restored'))
        <div class="container text-center my-3">
            <p class="btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">{{session()->get('movie_restored')}}</span>
            </p>
        </div>

    @elseif(session()->has('movie_prem_deleted'))
        <div class="container text-center my-3">
            <p class="btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">{{session()->get('movie_prem_deleted')}}</span>
            </p>
        </div>
    @endif




    @if($movies->count()>0)
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">الجدول</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header bg-dark py-3">
                    <h6 class="m-0 font-weight-bold text-light text-primary text-center">جدول جميع الافلام المحذوفة</h6>
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
                                    <td>  <img class="card-img " src="{{asset('images/movies')}}/{{$movie->imgPath}}" width="200px"> </td>
                                    <td>{{$movie->description}}</td>
                                    <td>{{$movie->releaseDate}}</td>
                                    <td>
                                        @foreach($movie->genres as $genre)
                                            {{$genre->name}}
                                        @endforeach
                                    </td>
                                    <td class="py-5">
                                        <div>
                                            <a href="{{route('dashboard.restore_movies',$movie->id)}}" onclick="event.preventDefault();
                                                document.getElementById('restore-form-{{ $movie->id }}').submit();"
                                               class="btn btn-success btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash-restore"></i>
                                                </span>
                                                <span class="text" role="button">أستعادة الفيلم</span>
                                            </a>

                                            <form id="restore-form-{{ $movie->id }}" action="{{ route('dashboard.restore_movies',$movie->id) }}"
                                                  method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>

                                        <hr>
                                        <div>
                                            <a href="{{route('dashboard.delete_movie',$movie->id)}}" onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $movie->id }}').submit();"
                                               class="btn btn-danger btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text" role="button">حذف الفيلم نهائياً</span>
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
                <h1 class="h3 mb-2 text-gray-800 text-center">لايوجد افلام في سلة المحذوفات</h1>
            </div>
            <div class="card-body">
            </div>
        </div>
    @endif


@endsection
