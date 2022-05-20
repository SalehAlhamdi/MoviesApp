@extends('admin.layouts.main')

@section('title')
    عرض جميع المسلسلات المحذوفة
@endsection

@section('pageName')
    عرض جميع المسلسلات المحذوفة
@endsection

@section('content')

    @if(session()->has('tvShow_restored'))
        <div class="container text-center my-3">
            <p class="btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">{{session()->get('tvShow_restored')}}</span>
            </p>
        </div>

    @elseif(session()->has('tvShow_prem_deleted'))
        <div class="container text-center my-3">
            <p class="btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">{{session()->get('tvShow_prem_deleted')}}</span>
            </p>
        </div>
    @endif

    @if($tvShows->count()>0)
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">الجدول</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header bg-dark py-3">
                    <h6 class="m-0 font-weight-bold text-light text-primary text-center">جدول جميع مسلسلات المحذوفة</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>أسم الفيلم</th>
                                <th>صورة الفيلم</th>
                                <th>قصة الفيلم</th>
                                <th>نوع الفيلم</th>
                                <th>العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tvShows as $tvShow)
                                <tr class="text-center">
                                    <td>{{$tvShow->title}}</td>
                                    <td>  <img class="card-img " src="{{asset('images/tvShows')}}/{{$tvShow->imgPath}}" style="max-width: 300px"> </td>
                                    <td>{{$tvShow->description}}</td>
                                    <td>
                                        @foreach($tvShow->genres as $genre)
                                            {{$genre->name}}
                                        @endforeach
                                    </td>
                                    <td class="py-5">
                                        <div>
                                            <a href="{{route('dashboard.restore_tvShow',$tvShow->id)}}" onclick="event.preventDefault();
                                                document.getElementById('restore-form-{{ $tvShow->id }}').submit();"
                                               class="btn btn-success btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash-restore"></i>
                                                </span>
                                                <span class="text" role="button">أستعادة المسلسل</span>
                                            </a>

                                            <form id="restore-form-{{ $tvShow->id }}" action="{{ route('dashboard.restore_tvShow',$tvShow->id) }}"
                                                  method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>

                                        <hr>
                                        <div>
                                            <a href="{{route('dashboard.delete_tvShow',$tvShow->id)}}" onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $tvShow->id }}').submit();"
                                               class="btn btn-danger btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text" role="button">حذف المسلسل نهائياً</span>
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
                <h1 class="h3 mb-2 text-gray-800 text-center">لايوجد مسلسلات في سلة المحذوفات</h1>
            </div>
            <div class="card-body">
            </div>
        </div>
    @endif


@endsection
