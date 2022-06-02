@extends('admin.layouts.main')

@if(Route::is('dashboard.create.tvShow'))
    @section('title')
        أضافة مسلسل جديد
    @endsection

    @section('pageName')
        أضافة مسلسل جديد
    @endsection

@elseif(Route::is('dashboard.tvShow.update'))

    @section('title')
        تعديل على  مسلسل
    @endsection

    @section('pageName')
        تعديل على  مسلسل
    @endsection

@endif

@section('content')

    @if(session()->has('success_add_movie'))
        <div class="container text-center my-3">
            <p href="" class="btn btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">{{session()->get('success_add_movie')}}</span>
            </p>
        </div>
    @endif

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Custom Text Color Utilities -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 px-5 text-center">
                        <h6 class="m-0 font-weight-bold text-primary">أضافة مسلسل</h6>
                    </div>
                    <div class="card-body" >
                        <form method="post" class="user" action="{{route('dashboard.store_tvShow')}}" enctype="multipart/form-data" >
                            @csrf

                            @if($errors->any())
                                <div class="alert alert-danger text-center">الرجاء التأكيد من ملئ جميع المعلومات</div>
                            @endif

                            <div class="form-group">
                                <input  placeholder="اسم المسلسل" type="text" class="form-control form-control-user text-center" name="title" style="font-size: 18px">
                            </div>


                            <hr class="sidebar-divider">

                            <div class="form-group ">
                                <label for="formFileSm" class="form-label ">صورة المسلسل</label>


                                <input class="form-control"  name="image" type="file" onchange="preview_file(this)">
                                <img id="preview_img" class="my-3 rounded img-fluid">
                            </div>


                            @if($genres->count()>0)
                                <hr class="sidebar-divider">
                                <div class="form-group text-center">
                                    <label>أختيار صفات المسلسل</label>
                                    <select name="genres[]" id="genres" class="form-control genre-selector" multiple>
                                        @foreach($genres as $genre)
                                            <option value="{{$genre->id}}">

                                                {{$genre->name}}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <hr class="sidebar-divider mt-3">

                            <div class="form-group">
                                <input  placeholder="رقم الموسم" type="text" class="form-control text-center" name="season">
                            </div>


                            @if($types->count()>0)
                                <hr class="sidebar-divider">
                                <div class="form-group text-center">
                                    <label>أختيار نوع المسلسل</label>
                                    <select name="types[]" id="types" class="form-control genre-selector">
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">

                                                {{$type->name}}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <hr class="sidebar-divider mx-auto">



                            <div class="form-floating">
                                <textarea class="form-control text-right" placeholder="...قصة المسلسل" name="description" style="height: 200px"></textarea>
                            </div>

                            <hr class="sidebar-divider pt-3">

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                أضافة
                            </button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

