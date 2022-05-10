@extends('admin.layouts.main')

@section('title')
    أضافة فيلم جديد
@endsection

@section('pageName')
    أضافة فيلم جديد
@endsection

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
                            <input  placeholder="عنوان الفيلم" type="text" class="form-control form-control-user" name="movie_title" required autocomplete="new-password">
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

                            <input class="form-control" name="image" type="file" onchange="preview_file(this)">
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
                                <label>أختيار نوع الفيلم</label>
                                <select name="genres[]" id="genres" class="form-control" multiple>
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
                            <textarea class="form-control" placeholder="...قصة الفيلم" name="movie_description" style="height: 200px"></textarea>
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
@endsection
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

</script>
