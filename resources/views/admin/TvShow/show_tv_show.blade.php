@extends('admin.layouts.main')

@section('title')
    عرض جميع المسلسلات
@endsection

@section('pageName')
    عرض جميع المسلسلات
@endsection

@section('content')

    @if(session()->has('tvShow_deleted'))
        <div class="container text-center my-3">
            <p class="btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">{{session()->get('tvShow_deleted')}}</span>
            </p>
        </div>
    @endif

    @if($tvShows->count()>0)
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">الجدول</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header bg-dark py-3">
                <h6 class="m-0 font-weight-bold text-primary text-light  ">جدول جميع المسلسلات</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>أسم المسلسل</th>
                            <th>صورة المسلسل</th>
                            <th>قصة المسلسل</th>
                            <th>نوع المسلسل</th>
                            <th>تصنيف المسلسل</th>
                            <th>الموسم</th>
                            <th>عدد الحلقات</th>
                            <th>العمليات</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tvShows as $tvShow)
                            <tr class="text-center">
                                <td>{{$tvShow->title}}</td>
                                <td>  <img class=" card-img " src="{{asset('images/tvShows/')}}/{{$tvShow->imgPath}}" style="width:250px"> </td>
                                <td>{{$tvShow->description}}</td>
                                <td>
                                    @foreach($tvShow->types as $type)
                                        <p class="btn-sm btn-secondary d-inline-block  shadow-sm">
                                            {{$type->name}}
                                        </p>

                                    @endforeach
                                </td>

                                <td>
                                    @foreach($tvShow->genres as $genre)
                                        <p class="btn-sm btn-secondary d-inline-block  shadow-sm">
                                            {{$genre->name}}
                                        </p>

                                    @endforeach
                                </td>
                                <td>
                                    <p class="btn-sm btn-secondary d-inline-block  shadow-sm">
                                        {{$tvShow->season}}
                                    </p>
                                </td>

                                <td>
                                    <p class="btn-sm btn-secondary d-inline-block  shadow-sm">
                                        {{$tvShow->episodes->Count()}}
                                    </p>
                                </td>

                                <td>
                                    <div>

                                        <a href="{{route('dashboard.tvShow.info',$tvShow->id)}}"
                                           class="btn btn-info btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                            <span class="text" role="button">عرض الفيلم</span>
                                        </a>

                                        <hr>

                                        <a href="{{route('dashboard.tvShow.update',$tvShow->id)}}"
                                           class="btn btn-warning btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                            <span class="text" role="button">تعديل المسلسل</span>
                                        </a>

                                        <hr>

                                        <a href="{{route('dashboard.delete_tvShow',$tvShow->id)}}" onclick="event.preventDefault();
                                            document.getElementById('delete-form-{{ $tvShow->id }}').submit();"
                                           class="btn btn-danger btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            <span class="text" role="button">حذف المسلسل</span>
                                        </a>

                                        <form id="delete-form-{{ $tvShow->id }}" action="{{ route('dashboard.delete_tvShow',$tvShow->id) }}"
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
                <h1 class="h3 mb-2 text-gray-800 text-center">لايوجد مسلسلات حالياً حالياً</h1>
            </div>
            <div class="card-body">
            </div>
        </div>
    @endif


@endsection
