@extends('admin.layouts.main')

@section('title')
    معلومات المسلسل
@endsection

@section('pageName')
     معلومات المسلسل
@endsection

@section('content')

    @if(Route::is('dashboard.tvShow.info'))
        <div class="row">
            <div class=" card shadow  mb-4">
                <div class="card-header bg-dark py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-light text-center">{{$tvShow->title}}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">صورة الفيلم</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-sm-4 mt-3 mb-4" width="400"
                                             src="{{asset('images/TvShows')}}/{{$tvShow->imgPath}}" alt="...">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 mx-auto">

                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">قصة الفيلم</h6>
                                </div>
                                <div class="card-body">
                                    <p class="text-right"> {{$tvShow->description}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">الحلقات</h6>
                                </div>
                                <div class="card-body text-right">
                                    @foreach($tvShow->episodes as $episode)

                                        <a href="{{asset('videos/TvShows')}}/{{$episode->vidPath}}" type="video/mp4"
                                           class="btn btn-sm btn-secondary d-inline-block shadow-sm">
                                             <span class="text" role="button"> الحلقة{{$episode->ep_num}}

                                             </span>
                                        </a>

                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Route::is('dashboard.tvShow.update'))

        @if(session()->has('success_updated_tvShow'))
            <div class="container text-center my-3">
                <p href="" class="btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                    <span class="text">{{session()->get('success_updated_tvShow')}}</span>
                </p>
            </div>

        @elseif(session()->has('deleted_ep_success'))
            <div class="container text-center my-3">
                <p href="" class="btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                    <span class="text">{{session()->get('deleted_ep_success')}}</span>
                </p>
            </div>
        @endif

        <div class="row">

            <div class=" card shadow  mb-4 container-fluid">
                <div class="card-header bg-dark py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-light text-center">{{$tvShow->title}}</h6>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger text-center">الرجاء التأكيد من ملئ جميع المعلومات</div>
                    @endif
                    <form method="post" action="{{route('dashboard.edit_tvShow',$tvShow->id)}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">تنصيف المسلسل</h6>
                                </div>
                                <div class="card-body">
                                    <select name="genres[]" id="genres" class="form-control genre-selector" multiple>
                                        @foreach($genres as $genre)

                                            <option value="{{$genre->id}}" @if($tvShow->checkIfHas($genre->id,'genres')) selected @endif>
                                                {{$genre->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">صورة المسلسل</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">

                                        <input class="form-control " name="image" type="file" onchange="preview_file(this)">
                                        <img id="preview_img" class="img-fluid px-sm-4 mt-3 mb-4" width="400"
                                             src="{{asset('images/TvShows')}}/{{$tvShow->imgPath}}" alt="...">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-6 mx-auto">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center"> اسم المسلسل</h6>
                                </div>
                                <input type="text" name="title" class="form-control form-control-user text-center " style="font-size: 20px" value="{{$tvShow->title}}">
                            </div>
                            <hr>

                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">قصة المسلسل</h6>
                                </div>
                                        <textarea class="form-control text-right"  name="description" style="height: 100px;font-size: 20px">{{$tvShow->description}}</textarea>
                            </div>

                            <hr>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center"> الموسم</h6>
                                </div>
                                <input type="text" name="season" class="form-control form-control-user text-center " style="font-size: 20px" value="{{$tvShow->season}}">
                            </div>

                            <hr>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">الحلقات</h6>
                                </div>
                                @if($tvShow->episodes->Count()>0)
                                    <div class="card-body text-right">
                                        @foreach($tvShow->episodes as $episode)
                                            |

                                            <a href="{{route('dashboard.delete.episode',$episode->id)}}" onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $episode->id }}').submit();"
                                               class="btn btn-sm text-right btn-danger text-xs d-inline-block">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text" role="button">حذف</span>
                                            </a>

                                            <form id="delete-form-{{ $episode->id }}" action="{{ route('dashboard.delete.episode',$episode->id) }}"
                                                  method="POST" style="display: none;">
                                                @method('delete')
                                                @csrf
                                            </form>

                                            <a href="{{asset('videos/TvShows')}}/{{$episode->vidPath}}" type="video/mp4"
                                               class="btn btn-sm btn-secondary d-inline-block shadow-sm">
                                             <span class="text" role="button"> الحلقة{{$episode->ep_num}}

                                             </span>
                                            </a>
                                            |
                                        @endforeach
                                    </div>
                                @else
                                    <p class="btn btn-sm btn-secondary d-inline-block shadow-sm">
                                        لايوجد حلقات في المسلسل حالياً
                                    </p>
                                @endif
                            </div>
                            <hr>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">نوع المسلسل</h6>
                                </div>
                                <div class="card-body">
                                    <select name="types[]" id="types" class="form-control genre-selector">
                                        @foreach($types as $type)

                                            <option value="{{$type->id}}" @if($tvShow->checkIfHas($type->id,'types')) selected @endif>
                                                {{$type->name}}
                                            </option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                تحديث
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <script>
        function preview_file(input){
            var file=$('input[type=file]').get(0).files[0];
            if(file){
                var reader=new FileReader();
                reader.onload=function (){
                    $('#preview_img').attr('src',reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

        $(document).ready(function() {
            $('.genre-selector').select2();
        });

    </script>
@endsection
