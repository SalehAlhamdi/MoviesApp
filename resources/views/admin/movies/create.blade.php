@extends('admin.layouts.main')

@if(Route::is('dashboard.create'))
    @section('title')
        أضافة فيلم جديد
    @endsection

    @section('pageName')
        أضافة فيلم جديد
    @endsection

@elseif(Route::is('dashboard.movie.update'))

    @section('title')
        تعديل على  الفيلم
    @endsection

    @section('pageName')
        تعديل على  الفيلم
    @endsection

@endif

@section('collapse')
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">:العناصر</h6>
            <a class="collapse-item active" href="{{route('dashboard.create')}}">أضافة فلم</a>
            <a class="collapse-item" href="{{route('dashboard.show.movie')}}">عرض جميع الافلام</a>
        </div>
    </div>
@endsection

@section('content')

    @if(session()->has('success_add_movie'))
        <div class="container text-center my-3">
            <a href="" class="btn btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">{{session()->get('success_add_movie')}}</span>
            </a>
        </div>
    @endif

    @if(Route::is('dashboard.create'))

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Custom Text Color Utilities -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 px-5 text-center">
                        <h6 class="m-0 font-weight-bold text-primary">أضافة فيلم</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" class="user" action="{{route('dashboard.store_movie')}}" enctype="multipart/form-data" >
                            @csrf
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <input  placeholder="عنوان الفيلم" type="text" class="form-control form-control-user" name="movie_title">
                            </div>

                            <hr class="sidebar-divider">

                            <div class="col-sm-6 mb-3 mb-sm-0 mx-auto">
                                <input type="text" name="movie_rela" class="form-control form-control-user text-center" placeholder="تاريخ أصدار الفيلم">
                            </div>

                            <hr class="sidebar-divider">
                            @error('imgPath')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group mt-3">
                                <label for="formFileSm" class="form-label">صورة الفيلم</label>


                                <input class="form-control"  name="image" type="file" onchange="preview_file(this)">
                                <img id="preview_img" class="my-3 rounded img-fluid">
                            </div>

                            <hr class="sidebar-divider">

                            @error('movPath')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group mt-3">
                                <label for="formFileSm" class="form-label">أختيار  الفيلم</label>

                                <input class="form-control" name="movie" type="file">
                            </div>

                            @if($genres->count()>0)
                                <hr class="sidebar-divider">
                                <div class="form-group">
                                    <label>أختيار صفات الفيلم</label>
                                    <select name="genres[]" id="genres" class="form-control genre-selector" multiple>
                                        @foreach($genres as $genre)
                                            <option value="{{$genre->id}}">


                                                {{$genre->name}}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <hr class="sidebar-divider mx-auto">
                            @error('movie_description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating py-3">
                                <textarea class="form-control text-right" placeholder="...قصة الفيلم" name="movie_description" style="height: 200px"></textarea>
                            </div>

                            <hr class="sidebar-divider">

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                أضافة
                            </button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Route::is('dashboard.movie.update'))

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Custom Text Color Utilities -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 px-5 text-center">
                        <h6 class="m-0 font-weight-bold text-primary">تعديل الفيلم</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" class="user" action="{{route('dashboard.update_movie',$movies->id)}}" enctype="multipart/form-data" >
                            @csrf

                            <div class="h5 text-center font-weight-bold text-gray-800">أسم الفيلم</div>

                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group mt-4">
                                <input  value="{{$movies->title}}" type="text" id="movie_title" class="text-center  form-control form-control-user " style="font-size: 20px" name="movie_title">
                            </div>

                            <hr class="sidebar-divider mt-4">

                            <div class="h5 text-center font-weight-bold text-gray-800">سنة الاصدار</div>

                            <div class="col-sm-6 mb-3 mb-sm-0 mx-auto mt-4">
                                <input type="text" name="movie_rela" class="form-control form-control-user text-center " style="font-size: 20px" value="{{$movies->releaseDate}}">
                            </div>

                            <hr class="sidebar-divider mt-4">
                            @error('imgPath')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group mt-4">
                                <div class="h5 text-center font-weight-bold text-gray-800">صورة الفيلم</div>

                                <input class="form-control " name="image" type="file" onchange="preview_file(this)">
                                <div class="text-center">
                                    <img  id="preview_img" src="{{asset('images')}}/{{$movies->imgPath}}" width="250" class="my-3  rounded img-fluid">
                                </div>
                            </div>

                            <hr class="sidebar-divider">

                            @error('movPath')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group mt-3">
                                <div class="h5 text-center font-weight-bold text-gray-800">أختيار الفيلم</div>

                                <input class="form-control" data-bu name="movie" type="file">
                            </div>

                                <hr class="sidebar-divider mt-4">
                                <div class="form-group">
                                    <div class="h5 text-gray-800">صفات الفيلم</div>

                                    <select name="genres[]" id="genres" class="form-control genre-selector" multiple>
                                        @foreach($genres as $genre)

                                            <option value="{{$genre->id}}" @if($movies->hasGenre($genre->id)) selected @endif>
                                                    {{$genre->name}}
                                            </option>


                                        @endforeach
                                    </select>
                                </div>

                            @error('movie_description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <hr class="sidebar-divider mt-4">


                            <div class="h5 text-center font-weight-bold text-gray-800">وصف الفيلم</div>
                            <div class="form-floating py-3">
                                <textarea class="form-control text-right"  name="movie_description" style="height: 200px;font-size: 20px">{{$movies->description}}</textarea>
                            </div>

                            <hr class="sidebar-divider mt-4">

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                تحديث
                            </button>
                            <hr>
                        </form>
                    </div>
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

